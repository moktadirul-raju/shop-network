<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Category;
use Brian2694\Toastr\Facades\Toastr;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.basic.category',compact('categories'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'category'=>'required|unique:categories']);
        $category = new Category();
        $category->category = $request->category;
        $category->save();
        Toastr::success('New Category Added Successfully');
        return redirect()->route('admin.category.index');
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
        $this->validate($request,['category'=>'required']);
        $category = Category::findOrFail($id);
        $category->category = $request->category;
        $category->save();
        Toastr::info('Category Update Successfully');
        return redirect()->route('admin.category.index');
    }

    public function destroy($id)
    {
        Category::findOrFail($id)->delete();
        Toastr::error('Category Deleted Successfully');
        return redirect()->route('admin.category.index');
    }
}
