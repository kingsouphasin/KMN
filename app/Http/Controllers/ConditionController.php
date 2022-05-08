<?php

namespace App\Http\Controllers;

use App\Models\Condition;
use Illuminate\Http\Request;

class ConditionController extends Controller
{
    public function view(){
        $condition = Condition::all();
        return view('backend.condition.condition_view', compact('condition'));
    }

    public function store(Request $request){
        $request->validate([
            'note' => 'required'
        ]);
        Condition::insert([
            'note' => $request->note
        ]);
        $notification = array(
			'message' => 'Condition Inserted Successfully',
			'alert-type' => 'success'
		);

		return redirect()->back()->with($notification);
    }

    public function edit($id){
        $condition = Condition::findOrfail($id);
        return view('backend.condition.condition_edit', compact('condition'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'condition_note'
        ]);
        Condition::find($id)->update([
            'note' => $request->condition_note
        ]);
        $notification = array(
            'message' => 'Condition Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('condition.view')->with($notification);
    }
    public function delete($id){
        Condition::destroy($id);
        $notification = array(
			'message' => 'Condition Deleted Successfully',
			'alert-type' => 'success'
		);
        return redirect()->back()->with($notification);
    }

    
}
