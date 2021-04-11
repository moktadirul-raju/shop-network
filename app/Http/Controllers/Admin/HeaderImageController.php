<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Intervention\Image\Facades\Image;
use App\Model\HeaderImage;

class HeaderImageController extends Controller
{
    public function index(){
    	$images = HeaderImage::paginate(10);
    	return view('admin.pages.header_images',compact('images'));
    }

    public function store(Request $request){
    	$this->validate($request,[
    		'image'=>'required|mimes:jpg,png,jpeg'
    	]);
    	$header = new HeaderImage();
    	if($request->hasFile('image')) {
    		$image = $request->file('image');
	        $imageName = time().$image->getClientOriginalName();
            $image_resize = Image::make($image->getRealPath());
            $image_resize->resize(480, 360);
            $image_resize->save('images/banner/'.$imageName);
        }
        $header->image = 'images/banner/'.$imageName;
        $header->save();
        Toastr::success('Header Image Added Successfully');
        return redirect()->route('admin.header-image.index');
    }

    public function update(Request $request, $id){
    	$header = HeaderImage::find($id);
    	if($file = $request->file('image')) {
            $this->validate($request,['image'=>'mimes:jpg,png,jpeg']);
            if(file_exists($header->image) AND !empty($header->image)){
                unlink($header->image);
            }
            $image = $request->file('image');
            $imageName = time().$image->getClientOriginalName();
            $image_resize = Image::make($image->getRealPath());
            $image_resize->resize(300, 300);
            $image_resize->save('images/banner/' .$imageName);
            $header->image = 'images/banner/'.$imageName;
        } 
        $header->save();
        Toastr::info('Header Image Update Successfully');
        return redirect()->route('admin.header-image.index');
    }

    public function destroy($id){
    	$header = HeaderImage::find($id);
    	if(file_exists($header->image) AND !empty($header->image)){
                unlink($header->image);
            }
        $header->delete();
        Toastr::error('Deleted Successfully');
        return redirect()->route('admin.header-image.index');    
    }
}
