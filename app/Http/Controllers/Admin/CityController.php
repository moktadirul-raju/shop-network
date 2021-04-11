<?php

namespace App\Http\Controllers\Admin;

use App\Model\City;
use App\Model\Country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities = City::all();
        return view('admin.country.city',compact('cities'));
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
            'country_id' => 'required',
            'city_name' => 'required',
        ]);

        $city = new City();
        $city->country_id = $request->country_id;
        $city->city_name = $request->city_name;
        $city->save();
        Toastr::info('City Added Successfully');
        return redirect()->route('admin.country.show',$city->country_id);
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
        $city = City::find($id);
        $country = Country::find($city->country_id);
        $cities = City::where('country_id',$city->country_id)->get();
        return view('admin.country.city',compact('cities','city','country'));
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
            'city_name' => 'required',
        ]);

        $city = City::find($id);
        $city->city_name = $request->city_name;
        $city->save();
        Toastr::info('City Update Successfully');
        return redirect()->route('admin.country.show',$city->country_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        City::find($id)->delete();
        Toastr::error('City Delete Successfully');
        return redirect()->back();
    }
}
