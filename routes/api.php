<?php

use App\Model\Upazila;
use App\Model\District;
use App\Model\Division;
use App\Model\Union;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

include 'user.php';

Route::get('divisions','ApiController@allDivisions')->name('divisions');
Route::get('districts/{division_id}','ApiController@districts')
    ->name('districts');
Route::get('upazilas/{district_id}','ApiController@upazilas')
    ->name('upazilas');    

