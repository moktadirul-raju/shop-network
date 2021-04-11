<?php 
use Illuminate\Support\Facades\Auth;

Route::post('register', 'UserController@register');
Route::post('login', 'UserController@login');

Route::get('all-shop','ShopActivityController@allShop');
Route::post('search-shop','ShopActivityController@searchShop');
Route::get('all-banner','ShopActivityController@allBanner');

Route::group(['middleware'=>'auth:api'],function () {
   Route::get('user-profile','UserController@profile')
   	->name('user-profile');
   Route::post('update-profile','UserController@updateProfile')	
   	->name('update-profile');
   Route::get('all-category','ShopActivityController@allCategory'); 
   Route::get('all-facility','ShopActivityController@allFacility'); 
   Route::get('in-app-purchases','ShopActivityController@inAppPurchases'); 
   Route::post('add-shop','ShopActivityController@addShop');  
   Route::delete('shop-image-remove/{id}','ShopActivityController@shopImageRemove');
   Route::delete('remove-shop/{id}','ShopActivityController@removeShop');  
   Route::put('update-shop/{id}','ShopActivityController@addShop');  
   Route::get('user-shop','ShopActivityController@userShop'); 
     
   Route::post('submit-review','ShopActivityController@submitReview');  
   Route::post('submit-comment','ShopActivityController@submitComment');	
   Route::get('shop-details/{id}','ShopActivityController@shopDetails');
   Route::get('add-to-wishlist/{shop_id}','ShopActivityController@addToWishlist');
   Route::get('follow-shop/{shop_id}','ShopActivityController@followShop');
   Route::get('unfollow-shop/{shop_id}','ShopActivityController@unFollowShop');

	// Logout
   Route::get('go-offline','UserController@goOfline')->name('go-offline');
    Route::get('user-logout', 'UserController@logout')
    	->name('user-logout');
});



