<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\About;
use Brian2694\Toastr\Facades\Toastr;
use Intervention\Image\Facades\Image;

class AboutController extends Controller
{
    public function index(){
    	$about = About::first();
    	return view('admin.pages.about_setting',compact('about'));
    }

    public function update(Request $request, $id){
    	$about = About::find($id);
    	$about->title = $request->title;
    	$about->description = $request->description;
    	$about->content = $request->content;
    	$about->safety_tips = $request->safety_tips;
    	$about->email = $request->email;
    	$about->phone = $request->phone;
    	$about->website_link = $request->website_link;
    	$about->facebook_link = $request->facebook_link;
    	$about->youtube_link = $request->youtube_link;
    	$about->google_plus_link = $request->google_plus_link;
    	$about->instagram_link = $request->instagram_link;
    	$about->pinterest_link = $request->pinterest_link;
    	$about->twitter_link = $request->twitter_link;
    	if($request->file('image') != null) {
            $this->validate($request,['image'=>'mimes:jpg,png,jpeg']);
            if(file_exists($about->image) AND !empty($about->image)){
                unlink($about->image);
            }
            $image = $request->file('image');
            $imageName = time().$image->getClientOriginalName();
            $image_resize = Image::make($image->getRealPath());
            $image_resize->resize(300, 300);
            $image_resize->save('images/user/' .$imageName);
            $about->image = 'images/user/'.$imageName;
        }
    	$about->save();
    	Toastr::info('Section Update Successfully');
    	return redirect()->route('admin.about.index');
    }
}
