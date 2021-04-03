<?php

namespace App\Http\Controllers\Auth;

use URL;
use App\Model\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;


    protected $redirectTo;

    // public function _construct()
    // {
    //     $this->redirectTo =url()->previous();
    // }

    public function showLoginFrom()
    {
        return view('auth.login');
    }

    public function userLogin(Request $request)
    {
        $this->validate($request, [
            'mobile'   => 'required',
            'password' => 'required'
        ]);

        // Attempt to log the user in
        if (Auth::guard()->attempt([
            'mobile' => $request->mobile,
            'password' => $request->password
        ])) {
            if (Auth::check()) {
                if(Auth::user()->is_admin == 1){
                    return redirect()->intended(route('admin.dashboard'));
                } else {
                    if (!empty(session()->get('url'))) {
                        return Redirect::to(session('url'));
                    } elseif (Auth::user()->is_admin == 2) {
                        return redirect()->intended(route('user.dashboard'));
                    }
                }
            }
        }
        // if unsuccessful, then redirect back to the login with the form data
        return redirect()->back()
            ->with('message', 'Mobile Or Password Missmatched')
            ->withInput($request->only('mobile', 'remember'));
    }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
