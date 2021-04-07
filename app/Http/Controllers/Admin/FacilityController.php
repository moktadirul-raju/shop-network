<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Facility;
use Brian2694\Toastr\Facades\Toastr;

class FacilityController extends Controller
{
    public function index()
    {
        $facilites = Facility::all();
        return view('admin.basic.facility',compact('facilites'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $this->validate($request,['facility_name'=>'required']);
        $facility = new Facility();
        $facility->facility_name = $request->facility_name;
        $facility->save();
        Toastr::success('New Facility Added Successfully');
        return redirect()->route('admin.facility.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,['facility_name'=>'required']);
        $facility = Facility::findOrFail($id);
        $facility->facility_name = $request->facility_name;
        $facility->save();
        Toastr::info('Facility Update Successfully');
        return redirect()->route('admin.facility.index');
    }

    public function destroy($id)
    {
        Facility::findOrFail($id)->delete();
        Toastr::error('Facility Deleted Successfully');
        return redirect()->route('admin.facility.index');
    }
}
