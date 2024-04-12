<?php

namespace App\Http\Controllers\StationeryFrontend;

use App\Http\Controllers\Controller;
use App\Models\StationeryCategory;
use App\Models\StationeryProduct;
use Illuminate\Http\Request;

class StationeryHomeFrontend extends Controller
{
    public function index(){
        $featured_products=StationeryProduct::where('trending',1)->take(5)->get();
        $trending_category=StationeryCategory::where('popular',1)->take(7)->get();
        return view('stationeryfrontend.index',compact('featured_products','trending_category'));
    }
    public function category(){
        $category=StationeryCategory::where('status','0')->get();
        return view('stationeryfrontend.category',compact('category'));
    }
}
