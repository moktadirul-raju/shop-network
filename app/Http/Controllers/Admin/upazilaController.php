<?php

namespace App\Http\Controllers\Admin;

use App\Model\Upazila;
use App\Model\Division;
use App\Model\Union;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class upazilaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $upazilas = Upazila::orderBy('district_id','DESC')->get();
        $divisions = Division::all();
        return view('admin.address.upazilas',compact('upazilas','divisions'));
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
            'district_id' => 'required',
            'english_name' => 'required',
        ]);

        $upazila = new Upazila();
        $upazila->division_id = $request->division_id;
        $upazila->district_id = $request->district_id;
        $upazila->english_name = $request->english_name;
        $upazila->bangla_name = $request->bangla_name;
        $upazila->save();
        return redirect()->route('admin.upazila.index')->with(['message' => 'Upazila Added Successfully', 'type' => 'success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $unions = Union::where('upazila_id',$id)->paginate(10);
        return view('admin.address.unions',compact('unions'));
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
        $divisions = Division::all();
        $upazilas = Upazila::all();
        return view('admin.address.upazilas',compact('upazilas','divisions','upazila'));
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
            'district_id' => 'required',
            'english_name' => 'required',
        ]);

        $upazila = Upazila::find($id);
        $upazila->division_id = $request->division_id;
        $upazila->district_id = $request->district_id;
        $upazila->english_name = $request->english_name;
        $upazila->bangla_name = $request->bangla_name;
        $upazila->save();
        return redirect()->route('admin.upazila.index')->with(['message' => 'Upazila Updated Successfully', 'type' => 'info']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return redirect()->route('admin.upazila.index')->with(['message' => 'Apadoto delete bondho ache', 'type' => 'danger']);

    }
}
