<?php

namespace App\Http\Controllers\Admin;

use App\Model\District;
use App\Model\Division;
use App\Model\Upazila;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
        $divisions = Division::all();
        return view('admin.address.district',compact('divisions','districts'));
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
        return redirect()->route('admin.district.index')->with(['message' => 'District Added Successfully', 'type' => 'info']);
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
        $divisions = Division::all();
        return view('admin.address.upazilas',compact('upazilas','divisions'));
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
        $divisions = Division::all();
        $districts = District::all();
        return view('admin.address.district',compact('divisions','districts','district'));
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
            'division_id' => 'required',
            'english_name' => 'required',
        ]);

        $district = District::find($id);
        $district->division_id = $request->division_id;
        $district->english_name = $request->english_name;
        $district->bangla_name = $request->bangla_name;
        $district->save();
        return redirect()->route('admin.district.index')->with(['message' => 'District Update Successfully', 'type' => 'info']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //District::find($id)->delete();
        return redirect()->route('admin.district.index')->with(['message' => 'Apadoto delete bondho ache,h', 'type' => 'danger']);
    }
}
