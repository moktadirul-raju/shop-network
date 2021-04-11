<?php
namespace App\Http\Controllers\Api;
use App\Model\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;


class UserController extends Controller
{
	public function __construct() {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }

    public $successStatus = 200;

    public function login(Request $request){
        $validator = Validator::make($request->all(), [
            'mobile' => 'required',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        if (!$token = JWTAuth::attempt($validator->validated())) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->createNewToken($token);
    }


    public function register(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'mobile' => 'required|unique:users|min:11',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
        ]);
        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }
        $user = new User();
        $user->name = $request->name;
        $user->mobile = $request->mobile;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        return response()->json([
            'message' => 'Registraion Successfull',
            'user' => $user
        ], 201);
    }

    protected function createNewToken($token){
        $user = auth()->user();
        $user->online_status = 1;
        $user->save();
        return response()->json([
        'access_token' => $token,
        'token_type' => 'bearer',
        'expires_in' => auth('api')->factory()->getTTL() * 60,
        'user' => auth()->user()
    ]);
    }

    public function refresh()
    {
        return $this->createNewToken(auth()->refresh());
    }

    public function profile()
    {
        try {
		    $user = auth()->userOrFail();
		    return response()->json(['user'=>$user]);
		} catch (\Tymon\JWTAuth\Exceptions\UserNotDefinedException $e) {
		     return response()->json(['error' => 'Unauthorized'], 401);
		}
    }

    public function updateProfile(Request $request){
        $user = auth()->user();
        $user->name = $request->name ? $request->name : $user->name;
        $user->nickname = $request->nickname ? $request->nickname : $user->nickname;
        $user->email = $request->email ? $request->email : $user->email;
        $user->mobile = $request->mobile ? $request->mobile : $user->mobile;
        if(isset($request->password)){
            $user->password = Hash::make($request->password);
        }
        if($request->file('image') != null) {
            $this->validate($request,['image'=>'mimes:jpg,png,jpeg']);
            if(file_exists($user->image) AND !empty($user->image)){
                unlink($user->image);
            }
            $image = $request->file('image');
            $imageName = time().$image->getClientOriginalName();
            $image_resize = Image::make($image->getRealPath());
            $image_resize->resize(300, 300);
            $image_resize->save('images/user/' .$imageName);
            $user->image = 'images/user/'.$imageName;
        } 
        $user->save();
        return response()->json([
            'message' => 'Profile Update Successfully',
            'user' => $user
        ]);
    }

    public function resetPassword(Request $request){
        $user = User::where('mobile',$request->mobile)->first();
        if(isset($user)){
            $password = Hash::make($request->password);
            $user->password = $password;
            $user->save();
            return [
                'message'=>'Password Set Successfully',
                'redirect'=>route('login')
            ];
        } else {
            return response()->json(['error'=>'Invalid User']);
        }

    }

    
    public function logout()
    {
        auth()->logout(true);
        return response()->json(['message' => 'User successfully signed out']);
    }

    public function goOfline(){
        $user = Auth::user();
        $user->online_status = 0;
        $user->save();
    }

    // public function logout (Request $request) {

    //     $token = $request->user()->token();
    //     $token->revoke();

    //     $response = 'You have been succesfully logged out!';
    //     return response($response, 200);

    // }
}
