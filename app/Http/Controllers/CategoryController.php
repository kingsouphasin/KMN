<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // Api
    public function show(){
        return Category::all();
    }

    public function view(){
        $category = Category::all();
        return view('backend.category.category_view', compact('category'));
    }

    public function store(Request $request){
        $request->validate([
            'category_name' => 'required'
        ]);
        Category::insert([
            'name' => $request->category_name
        ]);
        $notification = array(
			'message' => 'Category Inserted Successfully',
			'alert-type' => 'success'
		);

		return redirect()->back()->with($notification);
    }

    public function edit($id){
        $category = Category::findOrfail($id);
        return view('backend.category.category_edit', compact('category'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'category_name'
        ]);
        Category::find($id)->update([
            'name' => $request->category_name
        ]);
        $notification = array(
            'message' => 'Category Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('category.view')->with($notification);
    }
    public function delete($id){
        Category::destroy($id);
        $notification = array(
			'message' => 'Category Deleted Successfully',
			'alert-type' => 'success'
		);
        return redirect()->back()->with($notification);
    }
}
