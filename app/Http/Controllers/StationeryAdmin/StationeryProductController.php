<?php

namespace App\Http\Controllers\StationeryAdmin;

use App\Http\Controllers\Controller;
use App\Models\StationeryCategory;
use App\Models\StationeryProduct;
use Illuminate\Http\Request;

class StationeryProductController extends Controller
{
    public function index()
    {
        $products=StationeryProduct::all();
        return view('stationeryadmin.stationeryproduct.index',compact('products'));
    }
}
