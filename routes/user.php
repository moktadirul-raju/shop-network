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
   Route::get('user-shop','ShopActivityController@userShop'); 
   Route::post('search-shop','ShopActivityController@searchShop');  
   Route::post('submit-review','ShopActivityController@submitReview');  
   Route::post('submit-comment','ShopActivityController@submitComment');	
   Route::get('all-shop','ShopActivityController@allShop');
   Route::get('shop-details/{id}','ShopActivityController@shopDetails');
   Route::get('add-to-wishlist/{shop_id}','ShopActivityController@addToWishlist');
   Route::get('follow-shop/{shop_id}','ShopActivityController@followShop');
   Route::get('unfollow-shop/{shop_id}','ShopActivityController@unFollowShop');

	// Logout
    Route::get('user-logout', 'UserController@logout')
    	->name('user-logout');;
});



