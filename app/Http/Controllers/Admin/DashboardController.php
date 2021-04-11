<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Brian2694\Toastr\Facades\Toastr;
use Intervention\Image\Facades\Image;
use App\Model\User;
use App\Model\Shop;
use App\Model\ShopImage;
use App\Model\ShopFacility;
use App\Model\Review;
use App\Model\Comment;
use App\Model\Follow;
use App\Model\Wishlist;
use App\Model\PaypalInfo;
use App\Model\Policy;
use App\Model\Currency;
use Response;

class DashboardController extends Controller
{
    public function index(){
        return view('admin.dashboard');
    }

    public function profile(){
        return view('admin.profile');
    }

    public function profileUpdate(Request $request){
        $admin = Auth::user();
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->mobile = $request->mobile;
        if(isset($request->password)){
            $admin->password = Hash::make($request->password);
        }
        if($request->file('image') != null) {
            $this->validate($request,['image'=>'mimes:jpg,png,jpeg']);
            if(file_exists($admin->image) AND !empty($admin->image)){
                unlink($admin->image);
            }
            $image = $request->file('image');
            $imageName = time().$image->getClientOriginalName();
            $image_resize = Image::make($image->getRealPath());
            $image_resize->resize(300, 300);
            $image_resize->save('images/user/' .$imageName);
            $admin->image = 'images/user/'.$imageName;
        }
        $admin->save();
        Toastr::info('Profile Updated Successfully','Success');
        return redirect()->route('admin.profile');
    }

    public function allUser(){
    	$users = User::latest()->get();
    	return view('admin.all_user',compact('users'));
    }

    public function editUser($id){
        $user = User::findOrFail($id);
        return view('admin.edit_user',compact('user'));
    }

    public function updateUser(Request $request, $id){
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->nickname = $request->nickname;
        $user->email = $request->email;
        $user->mobile = $request->mobile;
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
        Toastr::info('User Update Successfully');
        return redirect()->back();
    }

    public function deleteUser($id){
        $user = User::findOrFail($id);
        $shop = Shop::where('user_id',$id)->first();
        if(isset($shop)){
            $images = ShopImage::where('shop_id',$shop->id)->get();
            foreach($images as $image){
               if(file_exists($image->image) AND !empty($image->image)){
                    unlink($image->image);
                } 
                $image->delete();
            }
            $facilities = ShopFacility::where('shop_id',$shop->id)->get();
            foreach($facilities as $facility){
                $facility->delete();
            }

            Review::whereIn('shop_id',$shop->pluck('id','id'))->delete();
            Comment::whereIn('shop_id',$shop->pluck('id','id'))->delete();
            Follow::whereIn('shop_id',$shop->pluck('id','id'))->delete();
            Wishlist::whereIn('shop_id',$shop->pluck('id','id'))->delete();

            $shop->delete();
        }
        if(file_exists($user->image) AND !empty($user->image)){
            unlink($user->image);
        }
        Review::whereIn('user_id',$user->pluck('id','id'))->delete();
        Comment::whereIn('user_id',$user->pluck('id','id'))->delete();
        Follow::whereIn('user_id',$user->pluck('id','id'))->delete();
        Wishlist::whereIn('user_id',$user->pluck('id','id'))->delete();
        $user->delete();
        Toastr::info('User Deleted Successfully');
        return redirect()->back();
    }

    public function searchUser(Request $request){
        $query = $request->data;
        $users = User::where('name','LIKE',"%$query%")
                ->orWhere('email','LIKE',"%$query%")
                ->orWhere('mobile','LIKE',"%$query%")
                ->get();
        return view('admin.all_user',compact('users'));        
    }

    public function exportUser(){
        $headers = array(
            "Content-type" => "text/csv",
            "Content-Disposition" => "attachment; filename=users.csv",
            "Pragma" => "no-cache",
            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
            "Expires" => "0"
        );

        $users = User::all();
        $columns = array('Name', 'Nickname', 'Mobile', 'Email');

        $callback = function() use ($users, $columns)
        {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach($users as $user) {
                fputcsv($file, array($user->name, $user->nickname, $user->mobile, $user->email));
            }
            fclose($file);
        };
        return Response::stream($callback, 200, $headers);
    }

    public function exportShop(){
        $headers = array(
            "Content-type" => "text/csv",
            "Content-Disposition" => "attachment; filename=shops.csv",
            "Pragma" => "no-cache",
            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
            "Expires" => "0"
        );

        $shops = Shop::all();
        $columns = array('User', 'Category', 'Title', 'Established Date','Country','City','Street Address','Additional Address','Zip','Phone','Fax','Email','Website','Facebook Link','Twitter Link','Instagram Link','Youtube Link','Linkeding Link','Min Price','Max Price','Discount');

        $callback = function() use ($shops, $columns)
        {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach($shops as $shop) {
                fputcsv($file, array(
                    $shop->user->name, 
                    $shop->category->category, 
                    $shop->title, 
                    $shop->established_date,
                    $shop->country,
                    $shop->city,
                    $shop->street_address,
                    $shop->additional_address,
                    $shop->zip_code,
                    $shop->phone,
                    $shop->fax,
                    $shop->email,
                    $shop->website,
                    $shop->facebook_link,
                    $shop->twitter_link,
                    $shop->instagram_link,
                    $shop->youtube_link,
                    $shop->linkedin_link,
                    $shop->min_price,
                    $shop->max_price,
                    $shop->discount
                ));
            }
            fclose($file);
        };
        return Response::stream($callback, 200, $headers);
    }

    public function pendingShop(){
        $data = Shop::where('approve_status',0);
        $data->with([
            'user'=>function($query){
                $query->select('id','name');
            }
        ]);
        $shops = $data->oldest()->get();
        $title = 'Pending Request';
        return view('admin.pages.shops',compact('shops','title'));
    }

    public function approvedShop(){
        $data = Shop::where('approve_status',1);
        $data->with([
            'user'=>function($query){
                $query->select('id','name');
            }
        ]);
        $shops = $data->oldest()->get();
        $title = 'Approved Request';
        return view('admin.pages.shops',compact('shops','title'));
    }

    public function rejectedShop(){
        $data = Shop::where('approve_status',2);
        $data->with([
            'user'=>function($query){
                $query->select('id','name');
            }
        ]);
        $shops = $data->oldest()->get();
        $title = 'Rejected Request';
        return view('admin.pages.shops',compact('shops','title'));
    }

    public function searchShop(Request $request){
        $query = $request->mobile;
        $shop = Shop::where('phone','LIKE',"%$query%")
            ->orWhere('email','LIKE',"%$query%")
            ->first();
        return view('admin.pages.shop_details',compact('shop'));
    }

    public function approveReject(){
        $status = request()->get('status');
        Shop::find(request()->get('shop'))->update(['approve_status'=> $status]);
        if(request()->get('status') == 1){
            Toastr::success('Approved Successfully');
        }elseif(request()->get('status') == 2){
            Toastr::error('Application Reject');
        }
        return redirect()->back();
    }

    public function shopDetails($id){
        $shop = Shop::findOrFail($id);
        return view('admin.pages.shop_details',compact('shop'));
    }

    public function shopReviews($id){
        $shop = Shop::with('reviews')
            ->select('id','title')->where('id',$id)
            ->first();
        return view('admin.pages.shop_review',compact('shop'));
    }

    public function shopComments($id){
        $shop = Shop::with('comments')
            ->select('id','title')
            ->where('id',$id)->first();
        return view('admin.pages.shop_comments',compact('shop'));
    }

    public function paypalInfo(){
        $paypalInfo = PaypalInfo::first();
        return view('admin.pages.paypal_info',compact('paypalInfo'));
    }

    public function currency(){
        $currency = Currency::first();
        return view('admin.pages.currency',compact('currency'));
    }

    public function currencyUpdate(Request $request,$id){
        $currency = Currency::find($id);
        $currency->currency = $request->currency;
        Toastr::info('Currency Update Successfully');
        return view('admin.pages.currency',compact('currency'));
    }

    public function paypalInfoUpdate(Request $request){
        $paypalInfo = PaypalInfo::first();
        $paypalInfo->environment = $request->environment;
        $paypalInfo->public_key = $request->public_key;
        $paypalInfo->merchant_id = $request->merchant_id;
        $paypalInfo->private_key = $request->private_key;
        $paypalInfo->paypal_enabled = $request->paypal_enabled;
        Toastr::info('Paypal Info Update Successfully');
        $paypalInfo->save();
        return redirect()->back();
    }

    public function privacyPolicy(){
        $policy = Policy::first();
        return view('admin.pages.privacy_policy',compact('policy'));
    }

    public function updatePolicy(Request $request){
        $policy = Policy::first();
        $policy->content = $request->content;
        $policy->url = $request->url;
        $policy->save();
        Toastr::info('Policy Update Successfully');
        return view('admin.pages.privacy_policy',compact('policy'));
    }
}
