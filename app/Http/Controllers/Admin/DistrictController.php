<?php

namespace App\Http\Controllers\Admin;

use App\Model\District;
use App\Model\Division;
use App\Model\Upazila;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class DistrictController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $districts = District::all();
        return view('admin.address.district',compact('districts'));
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
            'division_id' => 'required',
            'english_name' => 'required',
        ]);

        $district = new District();
        $district->division_id = $request->division_id;
        $district->english_name = $request->english_name;
        $district->bangla_name = $request->bangla_name;
        $district->save();
        Toastr::info('District Added Successfully');
        return redirect()->route('admin.division.show',$district->division_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $upazilas = Upazila::where('district_id',$id)->orderBy('district_id','DESC')->get();
        $district = District::find($id);
        return view('admin.address.upazilas',compact('upazilas','district'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $district = District::find($id);
        $division = Division::find($district->division_id);
        $districts = District::where('division_id',$district->division_id)->get();
        return view('admin.address.district',compact('districts','district','division'));
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

        $district = District::find($id);
        $district->english_name = $request->english_name;
        $district->bangla_name = $request->bangla_name;
        $district->save();
        Toastr::info('District Update Successfully');
        return redirect()->route('admin.division.show',$district->division_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        District::find($id)->delete();
        Toastr::error('District Delete Successfully');
        return redirect()->back();
    }
}
