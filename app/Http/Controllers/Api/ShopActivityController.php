<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Brian2694\Toastr\Facades\Toastr;
use Intervention\Image\Facades\Image;
use App\Model\Shop;
use App\Model\Wishlist;
use App\Model\ShopImage;
use App\Model\ShopFacility;
use App\Model\Follow;
use App\Model\Review;
use App\Model\Comment;
use App\Model\Category;
use App\Model\Facility;
use App\Model\Banner;
use App\Model\InAppPurchase;
use App\Model\Saturday;
use App\Model\Sunday;
use App\Model\Monday;
use App\Model\Tuesday;
use App\Model\Wednesday;
use App\Model\Thursday;
use App\Model\Friday;

class ShopActivityController extends Controller
{
	public function allShop(){
		$data = Shop::query();
        $data->with([
            'category'=>function($query){
                $query->select('id','category');
            },
            'facilities' => function($query){
                $query->select('facility_name');
            },
            'images' => function($query){
                $query->select('shop_id','image');
            },

            'followers' => function($query){
                $query->count();
            },
            'reviews' => function($query){
                $query->with([
                    'user' =>function($query){
                        $query->select('id','name');
                    }
                ]);
                $query->select('id','shop_id','user_id','rating','review');
            },
            'comments' => function($query){
                $query->with([
                    'user' =>function($query){
                        $query->select('id','name');
                    }
                ]);
                $query->select('id','shop_id','user_id','comment');
            },
            'saturday'=>function($query){
                $query->select('id','shop_id','day','opening_status','opening_time','closing_time');
            },
            'sunday'=>function($query){
                $query->select('id','shop_id','day','opening_status','opening_time','closing_time');
            },
            'monday'=>function($query){
                $query->select('id','shop_id','day','opening_status','opening_time','closing_time');
            },
            'tuesday'=>function($query){
                $query->select('id','shop_id','day','opening_status','opening_time','closing_time');
            },
            'wednesday'=>function($query){
                $query->select('id','shop_id','day','opening_status','opening_time','closing_time');
            },
            'thursday'=>function($query){
                $query->select('id','shop_id','day','opening_status','opening_time','closing_time');
            },
            'friday'=>function($query){
                $query->select('id','shop_id','day','opening_status','opening_time','closing_time');
            }

        ]);
        $shops = $data->get();
		if(sizeof($shops) > 0){
			$message = 'Data Found';
		} else{
			$message = 'No Data Found';
		}

		return response()->json(['message'=>$message,'data'=>$shops]);
	}

    public function allBanner(){
        $banners = Banner::inRandomOrder()->get();
        return response()->json(['data'=>$banners]);
    }

    public function inAppPurchases(){
        $apps = InAppPurchase::all();
        return response()->json(['data'=> $apps]);
    }

    public function shopDetails($id){
        $data = Shop::where('id',$id);
        $data->with([
            'category'=>function($query){
                $query->select('id','category');
            },
            'facilities' => function($query){
                $query->select('facility_name');
            },
            'images' => function($query){
                $query->select('shop_id','image');
            },

            'followers' => function($query){
                $query->count();
            },
            'reviews' => function($query){
                $query->with([
                    'user' =>function($query){
                        $query->select('id','name');
                    }
                ]);
                $query->select('id','shop_id','user_id','rating','review');
            },
            'comments' => function($query){
                $query->with([
                    'user' =>function($query){
                        $query->select('id','name');
                    }
                ]);
                $query->select('id','shop_id','user_id','comment');
            },
            'saturday'=>function($query){
                $query->select('id','shop_id','day','opening_status','opening_time','closing_time');
            },
            'sunday'=>function($query){
                $query->select('id','shop_id','day','opening_status','opening_time','closing_time');
            },
            'monday'=>function($query){
                $query->select('id','shop_id','day','opening_status','opening_time','closing_time');
            },
            'tuesday'=>function($query){
                $query->select('id','shop_id','day','opening_status','opening_time','closing_time');
            },
            'wednesday'=>function($query){
                $query->select('id','shop_id','day','opening_status','opening_time','closing_time');
            },
            'thursday'=>function($query){
                $query->select('id','shop_id','day','opening_status','opening_time','closing_time');
            },
            'friday'=>function($query){
                $query->select('id','shop_id','day','opening_status','opening_time','closing_time');
            }
        ]);
        $shop = $data->first();
        if(isset($shop)){
            $message = 'Data Found';
        } else{
            $message = 'No Data Found';
        }

        return response()->json(['message'=>$message,'data'=>$shop]);
    }

    public function userShop(){
        $shop = Shop::with('category','facilities','images','followers')
            ->where('user_id',Auth::id())->first();
        return $shop;
    }

	public function addToWishlist($shop_id){
		$wishlist = new Wishlist();
		$wishlist->user_id = Auth::id();
		$wishlist->shop_id = $shop_id;
		return response()->json(['message'=>'Added To wishlist']);
	}

    public function allCategory(){
        $data = Category::query();
        $categories = $data->get();
        if(sizeof($categories) > 0){
            $message = 'Data Found';
        } else{
            $message = 'No Data Found';
        }

        return response()->json(['message'=>$message,'data'=>$categories]);
    }

    public function allFacility(){
        $data = Facility::query();
        $facilities = $data->get();
        if(sizeof($facilities) > 0){
            $message = 'Data Found';
        } else{
            $message = 'No Data Found';
        }

        return response()->json(['message'=>$message,'data'=>$facilities]);
    }

    public function addShop(Request $request){
        if(Shop::where('user_id',Auth::id())->exists()){
            return response()->json(['message'=>'Can not add multiple shop']);
        }
        $shop = new Shop();
        $shop->user_id = Auth::id();
        $shop->category_id = $request->category_id;
        $shop->title = $request->title;
        $shop->established_date = $request->established_date;
        $shop->country = $request->country;
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
            $qrcode_url = 'http://koiva.mkraju.com/'.Auth::id().'/'.$request->discount;
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
        return response()->json(['message','Successfully Added']);
    }

    public function shopImageRemove($id){
        $image = ShopImage::findOrFail($id);
        if(file_exists($image->image) AND !empty($image->image)){
        unlink($image->image);
        }
        $image->delete();
        return response()->json(['message'=>'Image Removed']);
    }

    public function updateShop(Request $request,$id){
        $shop = Shop::findOrFail($id);
        $shop->user_id = Auth::id();
        $shop->category_id = $request->category_id;
        $shop->title = $request->title;
        $shop->established_date = $request->established_date;
        $shop->country = $request->country;
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
            $qrcode_url = 'http://koiva.mkraju.com/'.Auth::id().'/'.$request->discount;
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
        return response()->json(['message','Successfully Update']);
    }

    public function removeShop($id){
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
        return response()->json(['message','Shop Removed Successfully']);
        
    }

    public function searchShop(Request $request){
        $query = request()->get('query');
        $shop = Shop::where('street_address','LIKE',"%$query%")
                ->orWhere('additional_address','LIKE',"%$query%")
                ->orWhere('title','LIKE',"%$query%")
                ->orWhere('additional_address','LIKE',"%$query%")
                ->orWhere('phone','LIKE',"%$query%")
                ->orWhere('email','LIKE',"%$query%")
                ->orWhere('website','LIKE',"%$query%")
                ->orWhere('lat','LIKE',"%$query%")
                ->orWhere('lan','LIKE',"%$query%");
        $shop->with([
            'category'=>function($query){
                $query->select('id','category');
            },
            'facilities' => function($query){
                $query->select('facility_name');
            },
            'images' => function($query){
                $query->select('shop_id','image');
            },

            'followers' => function($query){
                $query->count();
            },
            'reviews' => function($query){
                $query->with([
                    'user' =>function($query){
                        $query->select('id','name');
                    }
                ]);
                $query->select('id','shop_id','user_id','rating','review');
            },
            'comments' => function($query){
                $query->with([
                    'user' =>function($query){
                        $query->select('id','name');
                    }
                ]);
                $query->select('id','shop_id','user_id','comment');
            }
        ]);
        $shops = $shop->get();
        if(sizeof($shops) > 0){
            $message = 'Data Found';
        } else{
            $message = 'No Data Found';
        }

        return response()->json(['message'=>$message,'data'=>$shops]);

    }

    public function submitReview(Request $request){
        $this->validate($request,[
            'shop_id'=>'required',
            'rating'=>'required'
        ]);

        $review = new Review();
        $review->user_id = Auth::id();
        $review->shop_id = $request->shop_id;
        $review->rating = $request->rating;
        $review->review = $request->review;
        $review->save();
        return response()->json(['message'=>'Thanks For Your Review']);
    }

     public function submitComment(Request $request){
        $this->validate($request,['comment'=>'required']);
        $comment = new Comment();
        $comment->user_id = Auth::id();
        $comment->shop_id = $request->shop_id;
        $comment->comment = $request->comment;
        $comment->save();
        return response()->json(['message'=>'Thanks For Your Comment']);
    }

    public function followShop($shop_id){
        if(Follow::where('user_id',Auth::id())->where('shop_id',$shop_id)->exists()){
            return response()->json(['message'=>'Already Added Follow List']);
        }else{
            $follow = new Follow();
            $follow->user_id = Auth::id();
            $follow->shop_id = $shop_id;
            $follow->save();
            return response()->json(['message'=>'Added To Following']);
        }

    }

    public function unFollowShop($shop_id){
        Follow::where('user_id',Auth::id())
            ->where('shop_id',$shop_id)->delete();
        return response()->json(['message'=>'Delete From Following']);    
    }
}
