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

class ShopActivityController extends Controller
{
	public function allShop(){
		$data = Shop::query();
        $data->with([
            'category'=>function($query){
                $query->select('category');
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

    public function shopDetails($id){
        $data = Shop::where('id',$id);
        $data->with([
            'category'=>function($query){
                $query->select('category');
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
                $query->select('category');
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
