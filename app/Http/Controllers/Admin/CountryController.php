<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Country;
use App\Model\City;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries = Country::all();
        return view('admin.country.country',compact('countries'));
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
        $request->validate(['country'=>'required']);
        $country = new Country();
        $country->country = $request->country;
        $country->save();
        Toastr::success('Country Added Successfully');
        return redirect()->route('admin.country.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $country = Country::find($id);
        $cities = City::where("Country_id",$id)->get();
        $countries = Country::all();
        return view('admin.country.city',compact('country','cities','countries'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $countries = Country::all();
        $country = Country::find($id);
        return view('admin.country.country', compact('countries','country'));
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
        $request->validate(['country' => 'required']);
        $country = Country::find($id);
        $country->country = $request->country;
        $country->save();
        return redirect()->route('admin.country.index')->with(['message' => 'country Update Successfully', 'type' => 'info']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $country = Country::find($id);
        City::whereIn('country_id',$country->pluck('id','id'));
        $country->delete();
        Toastr::error('Country Deleted Successfully');
        return redirect()->route('admin.country.index');
    }
}
