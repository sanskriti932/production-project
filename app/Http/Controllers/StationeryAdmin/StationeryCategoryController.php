<?php

namespace App\Http\Controllers\StationeryAdmin;

use App\Http\Controllers\Controller;
use App\Models\StationeryCategory;
use Illuminate\Http\Request;

class StationeryCategoryController extends Controller
{
    public function index(){
        $category=StationeryCategory::all();
        return view('stationeryadmin.stationerycategory.index',compact('category'));
    }
}
