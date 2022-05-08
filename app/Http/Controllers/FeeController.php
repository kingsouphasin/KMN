<?php

namespace App\Http\Controllers;

use App\Models\Price_cm;
use App\Models\Price_weight;
use Illuminate\Http\Request;

class FeeController extends Controller
{
    public function view(){
        $weigth = Price_weight::all();
        return view('backend.fee_calculation.fee_view', compact('weigth'));
    }

    public function store(Request $request){
        $request->validate([
            'weight' => 'required'
        ]);
        Price_weight::insert([
            'price' => $request->weight
        ]);
        $notification = array(
			'message' => 'Fee (weight) Inserted Successfully',
			'alert-type' => 'success'
		);

		return redirect()->back()->with($notification);
    }

    public function edit($id){
        $weight = Price_weight::findOrfail($id);
        return view('backend.fee_calculation.fee_edit', compact('weight'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'weight'
        ]);
        Price_weight::find($id)->update([
            'price' => $request->weight
        ]);
        $notification = array(
            'message' => 'Fee (weight) Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('fee.view')->with($notification);
    }
    public function delete($id){
        Price_weight::destroy($id);
        $notification = array(
			'message' => 'Fee (weight) Deleted Successfully',
			'alert-type' => 'success'
		);
        return redirect()->back()->with($notification);
    }

    // Cm
    public function view2(){
        $cm = Price_cm::all();
        return view('backend.fee_calculation.fee_view2', compact('cm'));
    }

    public function store2(Request $request){
        $request->validate([
            'cm' => 'required'
        ]);
        Price_cm::insert([
            'price' => $request->cm
        ]);
        $notification = array(
			'message' => 'Fee (Cm) Inserted Successfully',
			'alert-type' => 'success'
		);

		return redirect()->back()->with($notification);
    }

    public function edit2($id){
        $cm = Price_cm::findOrfail($id);
        return view('backend.fee_calculation.fee_edit2', compact('cm'));
    }

    public function update2(Request $request, $id){
        $request->validate([
            'cm'
        ]);
        Price_cm::find($id)->update([
            'price' => $request->cm
        ]);
        $notification = array(
            'message' => 'Fee (Cm) Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('cm.view')->with($notification);
    }
    public function delete2($id){
        Price_cm::destroy($id);
        $notification = array(
			'message' => 'Fee (Cm) Deleted Successfully',
			'alert-type' => 'success'
		);
        return redirect()->back()->with($notification);
    }
}
