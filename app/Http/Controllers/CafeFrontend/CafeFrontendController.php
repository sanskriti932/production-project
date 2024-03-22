<?php

namespace App\Http\Controllers\CafeFrontend;

use App\Http\Controllers\Controller;
use App\Models\CafeProduct;
use Illuminate\Http\Request;

class CafeFrontendController extends Controller
{
    public function index(){
        $featured_products=CafeProduct::where('trending',1)->take(5)->get();
        return view('cafefrontend.index',compact('featured_products'));
    }
}
