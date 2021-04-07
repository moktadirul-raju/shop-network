<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    public function facilities(){
    	return $this->belongsToMany(ShopFacility::class,'shop_facilities')
    		->withTimestamps();
    }
}
