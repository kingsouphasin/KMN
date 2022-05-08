<?php

namespace App\Http\Controllers\apiController;

use App\Http\Controllers\Controller;
use App\Models\Condition;
use Illuminate\Http\Request;

class ConditionController extends Controller
{
    public function show(){
        return Condition::all();
    }
}
