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
    Route::get('profile', 'DashboardController@profile')->name('profile');
    Route::put('profile', 'DashboardController@profileUpdate')
        ->name('profile');
    Route::get('user', 'DashboardController@allUser')->name('user');
    Route::get('edit-user/{id}', 'DashboardController@editUser')
        ->name('edit-user');
    Route::put('update-user/{id}', 'DashboardController@updateUser')
        ->name('update-user');
    Route::delete('delete-user/{id}', 'DashboardController@deleteUser')
        ->name('delete-user');        
    Route::post('search-user', 'DashboardController@searchUser')
        ->name('search-user');
    Route::get('sohp/pending','DashboardController@pendingShop')    
        ->name('pending-shop');
    Route::get('sohp/approved','DashboardController@approvedShop')    
        ->name('approved-shop'); 
    Route::get('sohp/rejected','DashboardController@rejectedShop')    
        ->name('rejected-shop'); 
    Route::post('search-shop','DashboardController@searchShop')
        ->name('search-shop');
    Route::get('sohp/details/{id}','DashboardController@shopDetails')    
        ->name('details'); 
    Route::get('sohp/comments/{id}','DashboardController@shopComments')    
        ->name('comments');
    Route::get('sohp/review/{id}','DashboardController@shopReviews')    
        ->name('review');        
    Route::get('approve-reject','DashboardController@approveReject')
        ->name('approve-reject');
    Route::get('currency','DashboardController@currency')    
        ->name('currency');
    Route::post('currency-update/{id}','DashboardController@currencyUpdate')    
        ->name('currency-update');         
    Route::get('paypal-info','DashboardController@paypalInfo')    
        ->name('paypal-info');
    Route::put('paypal-info-update','DashboardController@paypalInfoUpdate')
        ->name('paypal-info-update');    
    Route::resource('facility', 'FacilityController');
    Route::resource('shop', 'ShopController');
    Route::delete('shop-image-remove/{id}','ShopController@shopImageRemove')->name('shop-image-remove');
    Route::resource('category', 'CategoryController');
    Route::resource('country', 'CountryController');
    Route::resource('city', 'CityController');
    Route::resource('upazila', 'UpazilaController');
    Route::resource('notification', 'NotificationController');
    Route::resource('banner', 'BannerController');
    Route::resource('location', 'LocationController');
    Route::resource('about', 'AboutController');
    Route::resource('in-app-purchases','PurchasesController');
    Route::get('privacy_policy','DashboardController@privacyPolicy')->name('privacy_policy');
    Route::put('policy-update','DashboardController@updatePolicy')->name('policy-update');
    Route::resource('header-image', 'HeaderImageController');
    Route::get('export-user','DashboardController@exportUser')
        ->name('export-user');
    Route::get('export-shop','DashboardController@exportShop')
        ->name('export-shop');    
});


Route::get('admin-logout',function(){
	Auth::guard('admin')->logout();
    session()->flush();
    session()->regenerate();
    return redirect()->route('admin')->with('message','Admin Logout Successfully');
})->name('admin-logout');
