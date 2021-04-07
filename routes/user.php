<?php 
use Illuminate\Support\Facades\Auth;

Route::post('register', 'UserController@register');
Route::post('login', 'UserController@login');

Route::group(['middleware'=>'auth:api'],function () {
   Route::get('user-profile','UserController@profile')
   	->name('user-profile');
   Route::put('update-profile','UserController@updateProfile')	
   	->name('update-profile');
   Route::post('add-shop','ShopActivityController@addShop');	
   Route::get('all-shop','ShopActivityController@allShop');
   Route::get('add-to-wishlist/{shop_id}','ShopActivityController@addToWishlist');

	// Logout
    Route::get('user-logout', 'UserController@logout')
    	->name('user-logout');;
});



