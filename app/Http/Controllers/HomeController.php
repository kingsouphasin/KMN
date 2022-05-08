<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        $roles = Auth::user()->roles;
        if($roles == '0'){
            return view('admin.admin');
        }
        if($roles == '1'){
            return view('admin.admin1');
        }
        if($roles == '2'){
            return view('admin.admin2');
        }
        if($roles == '3'){
            return view('admin.admin3');
        }else{
            return view('admin.is_not_admin');
        }
    }
}
