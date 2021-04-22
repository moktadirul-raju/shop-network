<?php

use App\Model\Country;
use App\Model\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use GuzzleHttp\Client;

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

Route::get('get-lat-lan',function(){
	$client = new Client(); //GuzzleHttp\Client
	$address = request()->get('address');
	// GET ADDRESS BY LAT LAN
	$key = 'AIzaSyCOzORtiZKs1_ukE9C4p8SPZqIjHTljdDs';
	// $address = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?latlng=44.4647452,7.3553838&key='.urlencode($key));
	// return $address;
	$latLan = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='.urlencode($address).'&key='.urlencode($key));
	return $latLan;

	// GET LAT LAN BY ADDRESS
	$address = request()->get('address');
	$result =$client->post("https://maps.googleapis.com/maps/api/geocode/json?address=".urlencode($address), [ 
									'key'=>'AIzaSyCOzORtiZKs1_ukE9C4p8SPZqIjHTljdDs'
			])->getBody();
	return $result;
	$json =json_decode($result);
	$address->lat =$json->results[0]->geometry->location->lat;
	$address->lng =$json->results[0]->geometry->location->lng;
});    

