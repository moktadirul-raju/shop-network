<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Intervention\Image\Facades\Image;
use App\Model\Banner;

class BannerController extends Controller
{
    public function index(){
    	$banners = Banner::latest()->paginate(10);
    	return view('admin.basic.banner',compact('banners'));
    }

    public function store(Request $request){
    	$this->validate($request,[
    		'title'=>'required',
    		'image'=>'required|mimes:jpg,png,jpeg'
    	]);
    	$banner = new Banner();
    	$banner->title = $request->title;
    	if($request->hasFile('image')) {
	        $image = $request->file('image');
	        $imageName = time().$image->getClientOriginalName();
	        $image_resize = Image::make($image->getRealPath());
	        $image_resize->resize(300, 300);
	        $image_resize->save('images/banner/' .$imageName);
        }
        $banner->image = $imageName;
        $banner->save();
        Toastr::success('New Banner Added Successfully');
        return redirect()->route('admin.banner.index');
    }

    public function update(Request $request,$id){
        $this->validate($request,[
            'title'=>'required',
            
        ]);
        $banner = Banner::findOrFail($id);
        $banner->title = $request->title;
    	if($file = $request->file('image')) {
            $this->validate($request,['image'=>'mimes:jpg,png,jpeg']);
            if(file_exists('images/banner/'.$banner->image) AND !empty($banner->image)){
                unlink('images/banner/'.$banner->image);
            }
            $image = $request->file('image');
            $imageName = time().$image->getClientOriginalName();
            $image_resize = Image::make($image->getRealPath());
            $image_resize->resize(300, 300);
            $image_resize->save('images/banner/' .$imageName);
        } else{
            $imageName = $banner->image;
        }
        $banner->image = $imageName;
        $banner->save();
        Toastr::info('Banner Update Successfully','Success');
        return redirect()->route('admin.banner.index');
    }

    public function destroy($id){
    	$banner = Banner::findOrFail($id);
    	 if(file_exists('images/banner/'.$banner->image) AND !empty($banner->image)){
            unlink('images/banner/'.$banner->image);
            }
        $banner->delete();
        Toastr::error('Banner Delete Successfully');
        return redirect()->route('admin.banner.index');
    }
}
