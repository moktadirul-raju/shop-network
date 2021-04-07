<?php

namespace App\Http\Controllers\Admin;

use App\Model\Upazila;
use App\Model\Division;
use App\Model\District;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class UpazilaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $upazilas = Upazila::orderBy('district_id','DESC')->get();
        return view('admin.address.upazilas',compact('upazilas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'district_id' => 'required',
            'english_name' => 'required',
        ]);

        $upazila = new Upazila();
        $upazila->district_id = $request->district_id;
        $upazila->english_name = $request->english_name;
        $upazila->bangla_name = $request->bangla_name;
        $upazila->save();
        Toastr::success('New Upazila Added Successfully');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $upazila = Upazila::find($id);
        $upazilas = Upazila::where('district_id',$upazila->district_id)->get();
        $district = District::find($upazila->district_id);
        return view('admin.address.upazilas',compact('upazilas','upazila','district'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'english_name' => 'required',
        ]);

        $upazila = Upazila::find($id);
        $upazila->english_name = $request->english_name;
        $upazila->bangla_name = $request->bangla_name;
        $upazila->save();
        Toastr::info('Upazila Update Successfully');
        return redirect()->route('admin.district.show',$upazila->district_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Upazila::find($id)->delete();
        Toastr::error('Upazila Deleted Successfully');
        return redirect()->back();

    }
}
