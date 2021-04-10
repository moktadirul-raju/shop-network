<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Brian2694\Toastr\Facades\Toastr;
use App\Model\User;
use App\Model\Shop;
use App\Model\Comment;
use App\Model\Review;
use App\Model\PaypalInfo;

class DashboardController extends Controller
{
    public function index(){
        return view('admin.dashboard');
    }

    public function profile(){
        return view('admin.profile');
    }

    public function profileUpdate(Request $request){
        $admin = Auth::user();
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->mobile = $request->mobile;
        if(isset($request->password)){
            $admin->password = Hash::make($request->password);
        }
        $admin->save();
        Toastr::info('Profile Updated Successfully','Success');
        return redirect()->route('admin.profile');
    }

    public function allUser(){
    	$users = User::latest()->get();
    	return view('admin.all_user',compact('users'));
    }

    public function searchUser(Request $request){
        $query = $request->data;
        $users = User::where('name','LIKE',"%$query%")
                ->orWhere('email','LIKE',"%$query%")
                ->orWhere('mobile','LIKE',"%$query%")
                ->get();
        return view('admin.all_user',compact('users'));        
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

    public function approvedShop(){
        $data = Shop::where('approve_status',1);
        $data->with([
            'category'=>function($query){
                $query->select('id','category');
            }
        ]);
        $shops = $data->oldest()->get();
        $title = 'Approved Request';
        return view('admin.pages.shops',compact('shops','title'));
    }

    public function rejectedShop(){
        $data = Shop::where('approve_status',2);
        $data->with([
            'category'=>function($query){
                $query->select('id','category');
            }
        ]);
        $shops = $data->oldest()->get();
        $title = 'Rejected Request';
        return view('admin.pages.shops',compact('shops','title'));
    }

    public function searchShop(Request $request){
        $query = $request->mobile;
        $shop = Shop::where('phone','LIKE',"%$query%")
            ->orWhere('email','LIKE',"%$query%")
            ->first();
        return view('admin.pages.shop_details',compact('shop'));
    }

    public function approveReject(){
        $status = request()->get('status');
        Shop::find(request()->get('shop'))->update(['approve_status'=> $status]);
        if(request()->get('status') == 1){
            Toastr::success('Approved Successfully');
        }elseif(request()->get('status') == 2){
            Toastr::error('Application Reject');
        }
        return redirect()->back();
    }

    public function shopDetails($id){
        $shop = Shop::findOrFail($id);
        return view('admin.pages.shop_details',compact('shop'));
    }

    public function shopReviews($id){
        $shop = Shop::with('reviews')
            ->select('id','title')->where('id',$id)
            ->first();
        return view('admin.pages.shop_review',compact('shop'));
    }

    public function shopComments($id){
        $shop = Shop::with('comments')
            ->select('id','title')
            ->where('id',$id)->first();
        return view('admin.pages.shop_comments',compact('shop'));
    }

    public function paypalInfo(){
        $paypalInfo = PaypalInfo::first();
        return view('admin.pages.paypal_info',compact('paypalInfo'));
    }

    public function paypalInfoUpdate(Request $request){
        $paypalInfo = PaypalInfo::first();
        $paypalInfo->environment = $request->environment;
        $paypalInfo->public_key = $request->public_key;
        $paypalInfo->merchant_id = $request->merchant_id;
        $paypalInfo->private_key = $request->private_key;
        $paypalInfo->paypal_enabled = $request->paypal_enabled;
        Toastr::info('Paypal Info Update Successfully');
        $paypalInfo->save();
        return redirect()->back();
    }
}
