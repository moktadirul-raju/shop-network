<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    protected $fillable = ['approve_status'];
    public function facilities(){
    	return $this->belongsToMany(Facility::class,'shop_facilities','facility_id','shop_id')
    		->withTimestamps();
    }

    public function user(){
    	return $this->belongsTo(User::class);
    }

    public function category(){
    	return $this->belongsTo(Category::class);
    }

    public function division(){
    	return $this->belongsTo(Division::class);
    }

    public function district(){
    	return $this->belongsTo(District::class);
    }

    public function upazila(){
    	return $this->belongsTo(Upazila::class);
    }
}
