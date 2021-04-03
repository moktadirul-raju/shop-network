<?php

namespace App\Http\Controllers\User;

use App\Model\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        $user = Auth::user();
        return view('user.dashboard',compact('user'));
    }

    public function order(){
        $orders = Order::with('products')->where('user_id',Auth::id())->get();
        return view('user.order_history',compact('orders'));
    }
}
