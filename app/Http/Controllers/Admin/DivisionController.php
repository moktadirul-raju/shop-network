<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Division;
use App\Model\District;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class DivisionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $divisions = Division::all();
        return view('admin.address.division',compact('divisions'));
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
        $request->validate(['english_name'=>'required']);
        $division = new Division();
        $division->english_name = $request->english_name;
        $division->bangla_name = $request->bangla_name;
        $division->save();
        Toastr::success('Division Added Successfully');
        return redirect()->route('admin.division.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $division = Division::find($id);
        $districts = District::where("division_id",$id)->get();
        $divisions = Division::all();
        return view('admin.address.district',compact('division','districts','divisions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $divisions = Division::all();
        $division = Division::find($id);
        return view('admin.address.division', compact('divisions','division'));
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
        $request->validate(['english_name' => 'required']);
        $division = Division::find($id);
        $division->english_name = $request->english_name;
        $division->bangla_name = $request->bangla_name;
        $division->save();
        return redirect()->route('admin.division.index')->with(['message' => 'Division Update Successfully', 'type' => 'info']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Division::find($id)->delete();
        Toastr::error('Division Deleted Successfully');
        return redirect()->route('admin.division.index');
    }
}
