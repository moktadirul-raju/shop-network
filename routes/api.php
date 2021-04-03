<?php

use App\Model\Upazila;
use App\Model\District;
use App\Model\Division;
use App\Model\Union;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('divisions', function () {
    $divisions =  Division::with([
        'districts' => function ($query) {
            $query->select('id','division_id','english_name','bangla_name','url');
        },
        'districts.upazilas' => function ($query) {
            $query->select('id','district_id','english_name','bangla_name','url');
        },
        'districts.upazilas.unions' => function ($query) {
            $query->select('id','upazila_id','english_name','bangla_name','url');
        }
    ])->select('id','english_name','bangla_name','website_url')->get();

    if(sizeof($divisions)>0){
        $message = 'Data Found';
        $status = 200;
    } else {
        $message = 'Data Not Found';
        $status = 204;
    }
    return response()->json([
        'status' => $status,
        'message' => $message,
        'divisions' => $divisions->count(),
        'districts' => District::all()->count(),
        'upazilas' => Upazila::all()->count(),
        'unions' => Union::all()->count(),
        'data' => $divisions
    ]);
});

Route::get('districts/{division_id}',function($division_id){
    $districts = District::where('division_id',$division_id)->select('id','english_name','bangla_name')->get();
    return response()->json([
        'message' => 'Data Found',
        'status' => 200,
        'data' => $districts
    ]);
});

Route::get('upazilas/{district_id}', function ($district_id) {
    $upazilas = Upazila::where('district_id', $district_id)
        ->select('id','english_name', 'bangla_name')->get();
    return response()->json([
        'message' => 'Data Found',
        'status' => 200,
        'data' => $upazilas
    ]);
});
