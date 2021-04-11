<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Intervention\Image\Facades\Image;
use App\Model\PopularLocation as Location;


class LocationController extends Controller
{
    public function index(){
    	$locations = Location::latest()->paginate(10);
    	return view('admin.basic.popular_location',compact('locations'));
    }

    public function store(Request $request){
    	$this->validate($request,[
    		'location_name'=>'required',
    		'image'=>'required|mimes:jpg,png,jpeg'
    	]);
    	$location = new Location();
    	$location->location_name = $request->location_name;
    	if($request->hasFile('image')) {
	        $image = $request->file('image');
	        $imageName = time().$image->getClientOriginalName();
	        $image_resize = Image::make($image->getRealPath());
	        $image_resize->resize(300, 300);
	        $image_resize->save('images/location/' .$imageName);
        }
        $location->image = $imageName;
        $location->save();
        Toastr::success('New location Added Successfully');
        return redirect()->route('admin.location.index');
    }

    public function update(Request $request,$id){
        $this->validate($request,[
            'location_name'=>'required',
            
        ]);
        $location = Location::findOrFail($id);
        $location->location_name = $request->location_name;
    	if($file = $request->file('image')) {
            $this->validate($request,['image'=>'mimes:jpg,png,jpeg']);
            if(file_exists('images/location/'.$location->image) AND !empty($location->image)){
                unlink('images/location/'.$location->image);
            }
            $image = $request->file('image');
            $imageName = time().$image->getClientOriginalName();
            $image_resize = Image::make($image->getRealPath());
            $image_resize->resize(300, 300);
            $image_resize->save('images/location/' .$imageName);
        } else{
            $imageName = $location->image;
        }
        $location->image = $imageName;
        $location->save();
        Toastr::info('location Update Successfully','Success');
        return redirect()->route('admin.location.index');
    }

    public function destroy($id){
    	$location = Location::findOrFail($id);
    	 if(file_exists('images/location/'.$location->image) AND !empty($location->image)){
            unlink('images/location/'.$location->image);
            }
        $location->delete();
        Toastr::error('location Delete Successfully');
        return redirect()->route('admin.location.index');
    }
}
