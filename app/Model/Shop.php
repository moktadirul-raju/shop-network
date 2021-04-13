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

   public function images(){
        return $this->hasMany(ShopImage::class,'shop_id','id');
    }

    public function followers(){
        return $this->hasMany(Follow::class,'shop_id','id');
    }

    public function reviews(){
        return $this->hasMany(Review::class,'shop_id','id');
    }

    public function comments(){
        return $this->hasMany(Comment::class,'shop_id','id');
    }

    public function user(){
    	return $this->belongsTo(User::class,'user_id','id');
    }

    public function currency(){
        return $this->belongsTo(Currency::class,'currency_id','id');
    }

    public function category(){
    	return $this->belongsTo(Category::class);
    }

    public function country(){
    	return $this->belongsTo(Country::class,'country_id','id');
    }

    public function saturday(){
        return $this->hasMany(Saturday::class,'shop_id','id');
    }

    public function sunday(){
        return $this->hasMany(Sunday::class,'shop_id','id');
    }

    public function monday(){
        return $this->hasMany(Monday::class,'shop_id','id');
    }

    public function tuesday(){
        return $this->hasMany(Tuesday::class,'shop_id','id');
    }

    public function wednesday(){
        return $this->hasMany(Wednesday::class,'shop_id','id');
    }

     public function thursday(){
        return $this->hasMany(Thursday::class,'shop_id','id');
    }

    public function friday(){
        return $this->hasMany(Friday::class,'shop_id','id');
    }
}
