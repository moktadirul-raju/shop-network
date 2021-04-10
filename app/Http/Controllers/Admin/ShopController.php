<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Shop;

class ShopController extends Controller
{
    public function index(){
    	return $shops = Shop::latest()->get();

    }
}
