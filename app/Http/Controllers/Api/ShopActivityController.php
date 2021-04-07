<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Brian2694\Toastr\Facades\Toastr;
use App\Model\Shop;
use App\Model\Wishlist;

class ShopActivityController extends Controller
{
	public function allShop(){
		$shops = Shop::all();
		if(sizeof($shops) > 0){
			$message = 'Data Found';
		} else{
			$message = 'No Data Found';
		}

		return response()->json(['message'=>$message,'data'=>$shops]);
	}

	public function addToWishlist($shop_id){
		$wishlist = new Wishlist();
		$wishlist->user_id = Auth::id();
		$wishlist->shop_id = $shop_id;
		return response()->json(['message'=>'Added To wishlist']);
	}

    public function addShop(Request $request){
        $shop = new Shop();
        $shop->user_id = Auth::id();
        $shop->category_id = $request->category_id;
        $shop->title = $request->title;
        $shop->established_date = $request->established_date;
        $shop->division_id = $request->division_id;
        $shop->upazila_id = $request->upazila_id;
        $shop->address = $request->address;
        $shop->phone = $request->phone;
        $shop->fax = $request->fax;
        $shop->email = $request->email;
        $shop->website = $request->website;
        $shop->description = $request->description;
        $shop->min_price = $request->min_price;
        $shop->max_price = $request->max_price;
        $shop->discount = $request->discount;
        $shop->lat = $request->lat;
        $shop->lan = $request->lan;
        $shop->save();
        $hotel->facilities()->sync($request->facilities);
        if($request->hasFile('images')) {
            foreach($request->file('images') as $image){
                $imageName = time().$image->getClientOriginalName();
                $image_resize = Image::make($image->getRealPath());
                $image_resize->resize(480, 360);
                $image_resize->save('images/shop/'.$imageName);
                $data[] = $imageName;
                $images = new ShopImage();
                $images->shop_id = $shop->id;
                $images->image = 'images/shop/'.$imageName;
                //return 253;
                $images->save();
           }
        }
        return response()->json(['message','Successfully Added']);
    }

    public function shopImageRemove($id){
        $image = HotelImage::findOrFail($id);
        $hotel_id = $image->hotel_id;
        if(file_exists($image->image) AND !empty($image->image)){
        unlink($image->image);
        }
        $image->delete();
    }

    public function updateShop(){
    	if($request->hasfile('images'))
        {
            foreach($request->file('images') as $image)
            {
                $imageName = time().$image->getClientOriginalName();
                $image_resize = Image::make($image->getRealPath());
                $image_resize->resize(300, 300);
               // $image_resize->filesize(100);
                $image_resize->save('images/shop/' .$imageName);
                $data[] = $imageName;
                $images = new HotelImage();
                $images->hotel_id = $hotel->id;
                $images->image = 'images/shop/'.$imageName;
                $images->save();
            }
        }
    }

    public function removeShop(){
    	if(file_exists($facility->icon) AND !empty($facility->icon)){
        unlink($facility->icon);
        }
    }
}
