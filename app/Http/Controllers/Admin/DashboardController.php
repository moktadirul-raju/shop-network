<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Brian2694\Toastr\Facades\Toastr;
use App\Model\User;
use App\Model\Shop;

class DashboardController extends Controller
{
    public function index(){
        return view('admin.dashboard');
    }

    public function allUser(){
    	$users = User::latest()->get();
    	return view('admin.all_user',compact('users'));
    }

    public function searchUser(Request $request){
        return $request;          
    }

    public function pendingShop(){
        $data = Shop::where('approve_status',0);
        $data->with([
            'category'=>function($query){
                $query->select('id','category');
            }
        ]);
        $shops = $data->oldest()->get();
        $title = 'Pending Request';
        return view('admin.pages.shops',compact('shops','title'));
    }

    public function shopDetails($id){
        $shop = Shop::findOrFail($id);
        return view('admin.pages.shop_details',compact('shop'));
    }

    public function approveReject(){
        $status = request()->get('status');
        Shop::find(request()->get('shop'))->update(['approve_status'=> $status]);
        if(request()->get('status') == 1){
            Toastr::success('Approved Successfully');
        }elseif(request()->get('status') == 0){
            Toastr::error('Application Reject');
        }
        return redirect()->back();
    }
}
