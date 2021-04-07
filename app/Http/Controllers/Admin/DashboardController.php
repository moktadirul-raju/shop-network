<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Model\User;

class DashboardController extends Controller
{
    public function __construct(){
        if(Auth::check() && Auth::user()->is_admin == 1);
    }

    public function index(){
        return view('admin.dashboard');
    }

    public function allUser(){
    	$users = User::all();
    	return view('admin.all_user',compact('users'));
    }

    public function searchUser(Request $request){
        return $request;          
    }
}
