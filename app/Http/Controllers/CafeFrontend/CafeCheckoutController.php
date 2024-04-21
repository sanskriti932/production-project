<?php

namespace App\Http\Controllers\CafeFrontend;

use App\Http\Controllers\Controller;
use App\Models\CafeCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CafeCheckoutController extends Controller
{
    public function index(){
        $cartitems=CafeCart::where('user_id',Auth::id())->get();
        return view('cafefrontend.checkout',compact('cartitems'));
    }
}
