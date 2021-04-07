<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Division;
use App\Model\District;
use App\Model\Upazila;
use App\Model\Shop;
use App\Model\Review;
use App\Model\Comment;
use App\Model\Wishlist;

class ApiController extends Controller
{
    public function allDivisions(){
    	$divisions = Division::select('id','english_name','bangla_name')
    		->get();
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
        'data' => $divisions
    	]);
    }

    public function districts($division_id){
    	$districts = District::where('division_id',$division_id)
    		->select('id','english_name','bangla_name')->get();
    	if(sizeof($districts)>0){
	        $message = 'Data Found';
	        $status = 200;
	    } else {
	        $message = 'Data Not Found';
	        $status = 204;
	    }
    	return response()->json([
        'status' => $status,
        'message' => $message,
        'districts' => $districts->count(),
        'data' => $districts
    	]);
    }

    public function upazilas($district_id){
    	$upazilas = Upazila::where('district_id', $district_id)
        ->select('id','english_name', 'bangla_name')->get();
        if(sizeof($upazilas)>0){
	        $message = 'Data Found';
	        $status = 200;
	    } else {
	        $message = 'Data Not Found';
	        $status = 204;
	    }
    	return response()->json([
        'status' => $status,
        'message' => $message,
        'upazilas' => $upazilas->count(),
        'data' => $upazilas
    	]);
    }
}
