<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

class AdminProfileController extends Controller
{
    public function AdminProfile(){
		$adminData = Admin::find(1);
		return view('admin.admin_profile_view',compact('adminData'));
	}


    public function AdminProfileEdit(){
		$editData = Admin::find(1);
		return view('admin.admin_profile_edit',compact('editData'));

	}

    public function AdminProfileStore(Request $request, $id){
		$data = Admin::find(1);
		$data->name = $request->name;
		$data->email = $request->email;


		if ($request->file('profile_photo_path')) {
			$file = $request->file('profile_photo_path');
			@unlink(public_path('upload/admin_images/'.$data->profile_photo_path));
			$filename = date('YmdHi').$file->getClientOriginalName();
			$file->move(public_path('upload/admin_images'),$filename);
			$data['profile_photo_path'] = $filename;
		}
		$data->save();

		$notification = array(
			'message' => 'Admin Profile Updated Successfully',
			'alert-type' => 'success'
		);

		return redirect()->route('admin.profile')->with($notification);

	} // end method 
}
