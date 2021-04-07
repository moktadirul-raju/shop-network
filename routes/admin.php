<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

Route::get('admin',function(){
	return view('auth.admin_login');
})->name('admin');

Route::post('admin-login',function(Request $request){
    // $this->validate($request, [
    //     'email'   => 'required|email',
    //     'password' => 'required|min:6'
    // ]);
    if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
        return redirect()->intended(route('admin.dashboard'));

    }
    return redirect()->back()->withInput($request->only('email', 'remember'))->with('message','Email Or Password Mismatch');
})->name('admin-login');

Route::group(['as' => 'admin.', 'prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'auth:admin'], function () {
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');
    Route::get('user', 'DashboardController@allUser')->name('user');
    Route::post('search-user', 'DashboardController@searchUser')
        ->name('search-user');
    Route::resource('facility', 'FacilityController');
    Route::resource('category', 'CategoryController');
    Route::resource('division', 'DivisionController');
    Route::resource('district', 'DistrictController');
    Route::resource('upazila', 'UpazilaController');
    Route::resource('notification', 'NotificationController');
});


Route::get('admin-logout',function(){
	Auth::guard('admin')->logout();
    Auth::guard('web')->logout();
    session()->flush();
    session()->regenerate();
    return redirect()->route('admin')->with('message','Admin Logout Successfully');
})->name('admin-logout');
