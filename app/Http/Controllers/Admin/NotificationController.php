<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Model\Notification;

class NotificationController extends Controller
{
    public function index(){
    	$notifications = Notification::latest()->get();
    	return view('admin.pages.notification',compact('notifications'));
    }

    public function store(Request $request){
    	$notification = new Notification();
    	$notification->title = $request->title;
    	$notification->description = $request->description;
    	$notification->save();
    	Toastr::success('Notification Submitted Successfully');
    	return redirect()->back();
    }

    public function update(Request $request, $id){
    	$notification = Notification::findOrFail($id);
    	$notification->title = $request->title;
    	$notification->description = $request->description;
    	$notification->save();
    	Toastr::info('Notification Updated Successfully');
    	return redirect()->back();
    }

    public function destroy($id){
    	Notification::findOrFail($id)->delete();
    	Toastr::error('Notification Deleted Successfully');
    	return redirect()->back();
    }
}
