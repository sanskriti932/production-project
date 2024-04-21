<?php

namespace App\Http\Controllers\StationeryFrontend;

use App\Http\Controllers\Controller;
use App\Models\StationeryCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StationeryCheckoutController extends Controller
{
    public function index(){
        $cartitems=StationeryCart::where('user_id',Auth::id())->get();
        return view('stationeryfrontend.checkout',compact('cartitems'));
    }
}
