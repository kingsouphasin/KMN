<?php

namespace App\Http\Controllers;

use App\Models\Price_cm;
use App\Models\Price_weight;
use Illuminate\Http\Request;

class WeightController extends Controller
{
    public function showWeight(){
        return Price_weight::all();
    }
    public function showCm(){
        return Price_cm::all();
    }
}
