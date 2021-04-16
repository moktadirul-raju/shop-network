<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Brian2694\Toastr\Facades\Toastr;
use App\Model\Shop;
use App\Model\ShopImage;
use App\Model\Facility;
use App\Model\ShopFacility;
use App\Model\Category;
use App\Model\Review;
use App\Model\Comment;
use App\Model\Follow;
use App\Model\Wishlist;
use App\Model\User;
use App\Model\Country;
use App\Model\Saturday;
use App\Model\Sunday;
use App\Model\Monday;
use App\Model\Tuesday;
use App\Model\Wednesday;
use App\Model\Thursday;
use App\Model\Friday;

class ShopController extends Controller
{
    public function index(){
    	$shops = Shop::where('added_by','admin')->latest()->get();
    	return view('admin.pages.added_shop',compact('shops'));

    }

    public function create(){
    	$facilites = Facility::all();
        $categories = Category::all();
    	$countries = Country::all();
    	return view('admin.pages.add_shop',compact('facilites','categories','countries'));
    }

    public function store(Request $request){
        //return $request;
    	$user = User::where('mobile',$request->mobile)->first();
    	if(isset($user)){
    		if(Shop::where('user_id',$user->id)->exists()){
            Toastr::error('Shop Exists For This User');
            return redirect()->back();
        }
    	$shop = new Shop();
        $shop->added_by = 'admin';
        $shop->user_id = $user->id;
        $shop->category_id = $request->category_id;
        $shop->title = $request->title;
        $shop->established_date = $request->established_date;
        $shop->country_id = $request->country_id;
        $shop->city = $request->city;
        $shop->street_address = $request->street_address;
        $shop->additional_address = $request->additional_address;
        $shop->zip_code = $request->zip_code;
        $shop->facebook_link = $request->facebook_link;
        $shop->twitter_link = $request->twitter_link;
        $shop->instagram_link = $request->instagram_link;
        $shop->linkedin_link = $request->linkedin_link;
        $shop->youtube_link = $request->youtube_link;
        $shop->phone = $request->phone;
        $shop->fax = $request->fax;
        $shop->email = $request->email;
        $shop->website = $request->website;
        $shop->description = $request->description;
        $shop->currency = $request->currency;
        $shop->min_price = $request->min_price;
        $shop->max_price = $request->max_price;
        if($request->discount){
            $shop->discount = $request->discount;
            $qrcode_url = 'http://koiva.mkraju.com/'.$user->id.'/'.$request->discount;
            $url =  file_get_contents('https://chart.googleapis.com/chart?chs=150x150&cht=qr&chl='.urlencode($qrcode_url));
            $qrCode = 'images/qrcode/'.auth()->user()->mobile.'.jpg';
            file_put_contents($qrCode,$url);
            $shop->discount_qrcode_link = $qrcode_url;
            $shop->discount_qrcode_image = $qrCode;
        }
        $shop->lat = $request->lat;
        $shop->lan = $request->lan;
        $shop->save();
        $shop->facilities()->sync($request->facilities);
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

        // Days Report
        // Saturday
        $sat_identify = ['shop_id' => $shop->id];
        $sat_data = [
            'opening_status' => $request->sat_opening_status,
            'opening_time' => $request->sat_opening_time,
            'closing_time' => $request->sat_closing_time
        ];
        Saturday::updateOrCreate($sat_identify,$sat_data);
        // Sunday
        $sun_identify = ['shop_id' => $shop->id];
        $sun_data = [
            'opening_status' => $request->sun_opening_status,
            'opening_time' => $request->sun_opening_time,
            'closing_time' => $request->sun_closing_time
        ];
        Sunday::updateOrCreate($sun_identify,$sun_data);
        // Monday
        $mon_identify = ['shop_id' => $shop->id];
        $mon_data = [
            'opening_status' => $request->mon_opening_status,
            'opening_time' => $request->mon_opening_time,
            'closing_time' => $request->mon_closing_time
        ];
        Monday::updateOrCreate($mon_identify,$mon_data);
        // Tuesday
        $tues_identify = ['shop_id' => $shop->id];
        $tues_data = [
            'opening_status' => $request->tues_opening_status,
            'opening_time' => $request->tues_opening_time,
            'closing_time' => $request->tues_closing_time
        ];
        Tuesday::updateOrCreate($tues_identify,$tues_data);
        // Wednesday
        $wed_identify = ['shop_id' => $shop->id];
        $wed_data = [
            'opening_status' => $request->wed_opening_status,
            'opening_time' => $request->wed_opening_time,
            'closing_time' => $request->wed_closing_time
        ];
        Wednesday::updateOrCreate($wed_identify,$wed_data);
        // Thursday
        $thus_identify = ['shop_id' => $shop->id];
        $thus_data = [
            'opening_status' => $request->thus_opening_status,
            'opening_time' => $request->thus_opening_time,
            'closing_time' => $request->thus_closing_time
        ];
        Thursday::updateOrCreate($thus_identify,$thus_data);
         // Friday
        $fri_identify = ['shop_id' => $shop->id];
        $fri_data = [
            'opening_status' => $request->fri_opening_status,
            'opening_time' => $request->fri_opening_time,
            'closing_time' => $request->fri_closing_time
        ];
        Friday::updateOrCreate($fri_identify,$fri_data);
        
        Toastr::success('Shop Added Successfully');
        return redirect()->route('admin.shop.index'); 
        	} else{
        		Toastr::warning('User Not Found By This Mobile');
        		return redirect()->back();
        	}
    }

    public function edit($id){
        $shop = Shop::findOrFail($id);
        $facilities = Facility::all();
        $categories = Category::all();
        $countries = Country::all();
        return view('admin.pages.edit_shop',compact('shop','facilities','categories','countries'));
    }

    public function shopImageRemove($id){
        $image = ShopImage::findOrFail($id);
        if(file_exists($image->image) AND !empty($image->image)){
        unlink($image->image);
        }
        $image->delete();
    }

    public function update(Request $request,$id){
        $user = User::where('mobile',$request->mobile)->first();
        $shop = Shop::findOrFail($id);
        $shop->added_by = 'admin';
        $shop->user_id = $user->id;
        $shop->category_id = $request->category_id;
        $shop->title = $request->title;
        $shop->established_date = $request->established_date;
        $shop->country_id = $request->country_id;
        $shop->city = $request->city;
        $shop->street_address = $request->street_address;
        $shop->additional_address = $request->additional_address;
        $shop->zip_code = $request->zip_code;
        $shop->facebook_link = $request->facebook_link;
        $shop->twitter_link = $request->twitter_link;
        $shop->instagram_link = $request->instagram_link;
        $shop->linkedin_link = $request->linkedin_link;
        $shop->youtube_link = $request->youtube_link;
        $shop->phone = $request->phone;
        $shop->fax = $request->fax;
        $shop->email = $request->email;
        $shop->website = $request->website;
        $shop->description = $request->description;
        $shop->currency = $request->currency;
        $shop->min_price = $request->min_price;
        $shop->max_price = $request->max_price;
        if($request->discount){
            $shop->discount = $request->discount;
            $qrcode_url = 'http://koiva.mkraju.com/'.$user->id.'/'.$request->discount;
            $url =  file_get_contents('https://chart.googleapis.com/chart?chs=150x150&cht=qr&chl='.urlencode($qrcode_url));
            $qrCode = 'images/qrcode/'.auth()->user()->mobile.'.jpg';
            file_put_contents($qrCode,$url);
            $shop->discount_qrcode_link = $qrcode_url;
            $shop->discount_qrcode_image = $qrCode;
        }
        $shop->lat = $request->lat;
        $shop->lan = $request->lan;
        $shop->save();
        $shop->facilities()->sync($request->facilities);
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

        // Days Report
        // Saturday
        $sat_identify = ['shop_id' => $shop->id];
        $sat_data = [
            'shop_id' => $shop->id,
            'opening_status' => $request->sat_opening_status,
            'opening_time' => $request->sat_opening_time,
            'closing_time' => $request->sat_closing_time
        ];
        Saturday::updateOrCreate($sat_identify,$sat_data);
        // Sunday
        $sun_identify = ['shop_id' => $shop->id];
        $sun_data = [
            'shop_id' => $shop->id,
            'opening_status' => $request->sun_opening_status,
            'opening_time' => $request->sun_opening_time,
            'closing_time' => $request->sun_closing_time
        ];
        Sunday::updateOrCreate($sun_identify,$sun_data);
        // Monday
        $mon_identify = ['shop_id' => $shop->id];
        $mon_data = [
            'shop_id' => $shop->id,
            'opening_status' => $request->mon_opening_status,
            'opening_time' => $request->mon_opening_time,
            'closing_time' => $request->mon_closing_time
        ];
        Monday::updateOrCreate($mon_identify,$mon_data);
        // Tuesday
        $tues_identify = ['shop_id' => $shop->id];
        $tues_data = [
            'shop_id' => $shop->id,
            'opening_status' => $request->tues_opening_status,
            'opening_time' => $request->tues_opening_time,
            'closing_time' => $request->tues_closing_time
        ];
        Tuesday::updateOrCreate($tues_identify,$tues_data);
        // Wednesday
        $wed_identify = ['shop_id' => $shop->id];
        $wed_data = [
            'shop_id' => $shop->id,
            'opening_status' => $request->wed_opening_status,
            'opening_time' => $request->wed_opening_time,
            'closing_time' => $request->wed_closing_time
        ];
        Wednesday::updateOrCreate($wed_identify,$wed_data);
        // Thursday
        $thus_identify = ['shop_id' => $shop->id];
        $thus_data = [
            'shop_id' => $shop->id,
            'opening_status' => $request->thus_opening_status,
            'opening_time' => $request->thus_opening_time,
            'closing_time' => $request->thus_closing_time
        ];
        Thursday::updateOrCreate($thus_identify,$thus_data);
         // Friday
        $fri_identify = ['shop_id' => $shop->id];
        $fri_data = [
            'shop_id' => $shop->id,
            'opening_status' => $request->fri_opening_status,
            'opening_time' => $request->fri_opening_time,
            'closing_time' => $request->fri_closing_time
        ];
        Friday::updateOrCreate($fri_identify,$fri_data);
        
        Toastr::info('Shop Update Successfully');
        return redirect()->back(); 
    }

    public function destroy($id){
        $shop = Shop::find($id);
        $images = ShopImage::where('shop_id',$shop->id)->get();
        foreach($images as $image){
           if(file_exists($image->image) AND !empty($image->image)){
                unlink($image->image);
            } 
            $image->delete();
        }
        $facilities = ShopFacility::where('shop_id',$shop->id)->get();
        foreach($facilities as $facility){
            $facility->delete();
        }
        Review::whereIn('shop_id',$shop->pluck('id','id'))->delete();
        Comment::whereIn('shop_id',$shop->pluck('id','id'))->delete();
        Follow::whereIn('shop_id',$shop->pluck('id','id'))->delete();
        Wishlist::whereIn('shop_id',$shop->pluck('id','id'))->delete();
        Saturday::whereIn('shop_id',$shop->pluck('id','id'))->delete();
        Sunday::whereIn('shop_id',$shop->pluck('id','id'))->delete();
        Monday::whereIn('shop_id',$shop->pluck('id','id'))->delete();
        Tuesday::whereIn('shop_id',$shop->pluck('id','id'))->delete();
        Wednesday::whereIn('shop_id',$shop->pluck('id','id'))->delete();
        Thursday::whereIn('shop_id',$shop->pluck('id','id'))->delete();
        Friday::whereIn('shop_id',$shop->pluck('id','id'))->delete();
        $shop->delete();
        Toastr::success('Shop Removed Successfully');
        return redirect()->back(); 
        
    }
}
