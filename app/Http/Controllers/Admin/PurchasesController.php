<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\InAppPurchase;
use Brian2694\Toastr\Facades\Toastr;

class PurchasesController extends Controller
{
    public function index(){
    	$apps = InAppPurchase::all();
    	return view('admin.pages.in_app_purchases',compact('apps'));
    }

    public function create(){
    	return view('admin.pages.create_in_app_purchases');
    }

    public function store(Request $request){
    	$this->validate($request,[
    		'product_id' => 'required',
    		'day' => 'required',
    		'type' => 'required'
    	]);

    	$app = new InAppPurchase();
    	$app->product_id = $request->product_id;
    	$app->day = $request->day;
    	$app->description = $request->description;
    	$app->type = $request->type;
    	if(isset($request->is_published)){
    		$app->is_published = $request->is_published;
    	} else{
    		$app->is_published = 0;
    	}

    	$app->save();
    	Toastr::success('In App Purchased Added Successfully');
    	return redirect()->route('admin.in-app-purchases.index');
    }

    public function edit($id){
    	$app = InAppPurchase::findOrFail($id);
    	return view('admin.pages.create_in_app_purchases',compact('app')); 
    }

    public function update(Request $request, $id){
    	$this->validate($request,[
    		'product_id' => 'required',
    		'day' => 'required',
    		'type' => 'required'
    	]);

    	$app =  InAppPurchase::find($id);
    	$app->product_id = $request->product_id;
    	$app->day = $request->day;
    	$app->description = $request->description;
    	$app->type = $request->type;
    	if(isset($request->is_published)){
    		$app->is_published = $request->is_published;
    	} else{
    		$app->is_published = 0;
    	}

    	$app->save();
    	Toastr::info('In App Purchased Update Successfully');
    	return redirect()->route('admin.in-app-purchases.index');
    }

    public function destroy($id){
    	$app = InAppPurchase::find($id);
    	$app->delete();
    	Toastr::error('In App Purchased Delete Successfully');
    	return redirect()->route('admin.in-app-purchases.index');
    }
}
