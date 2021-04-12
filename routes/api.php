<?php

use App\Model\Country;
use App\Model\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

include 'user.php';

Route::get('divisions','ApiController@allDivisions')->name('divisions');
Route::get('districts/{division_id}','ApiController@districts')
    ->name('districts');
Route::get('upazilas/{district_id}','ApiController@upazilas')
    ->name('upazilas'); 

Route::get('all-country',function(){
	$countries = Country::orderBy('country','ASC')->get();
	return $countries;
});
Route::get('get-city/{country_id}',function($country_id){
	$cities = City::where('country_id',$country_id)
	->select('id','country_id','city_name')
	->get();
	return $cities;
});     

