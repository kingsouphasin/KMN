<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    public function branch_view(){
        $branch = Branch::all();
        return view('backend.branch.branch_view', compact('branch'));
    }

    public function store(Request $request){
        $request->validate([
            'branch_name' => 'required|string',
            'division' => 'required|string',
            'district' => 'required|string',
            'state' => 'required|string',
            'tel' => 'required|string',
        ]);
        Branch::insert([
            'name' => $request->branch_name,
            'division' => $request->division,
            'district' => $request->district,
            'state' => $request->state,
            'tel' => $request->tel,
        ]);
        $notification = array(
			'message' => 'Branch Inserted Successfully',
			'alert-type' => 'success'
		);

		return redirect()->back()->with($notification);
    }
    public function delete($id){
        $branch = Branch::destroy($id);
        $notification = array(
			'message' => 'Branch Deleted Successfully',
			'alert-type' => 'success'
		);
        return redirect()->back()->with($notification);
    }
    public function edit($id){
        $branch = Branch::findOrfail($id);
    
        return view('backend.branch.branch_edit', compact('branch'));
    }
    public function update(Request $request, $id){

        $branch = Branch::find($id)->update([
            'name' => $request->branch_name,
            'division' => $request->division,
            'district' => $request->district,
            'state' => $request->state,
            'tel' => $request->tel
        ]);
        $notification = array(
			'message' => 'Branch Updated Successfully',
			'alert-type' => 'info'
		);

		return redirect()->route('branch.view')->with($notification);
    }

    // Api
    public function show(){
        return Branch::all();
    }
}
