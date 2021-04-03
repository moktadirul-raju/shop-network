<?php
//https://bootsnipp.com/tags/ecommerce?page=1       Design Helper
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();
Route::get('logout',function(){
    Auth::logout();
    return redirect()->route('home');
});

Route::get('/','HomePageController@index')->name('home');

include 'admin.php'; // Admin Routes

