<?php

namespace App\Http\Controllers\StationeryFrontend;

use App\Http\Controllers\Controller;
use App\Models\StationeryCart;
use App\Models\StationeryProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StationeryCartController extends Controller
{
    public function addProduct(Request $request)
    {
        $product_id = $request->input('product_id');
        $product_qty = $request->input('product_qty');
        if (Auth::check()) {
            $prod_check = StationeryProduct::where('id', $product_id)->first();
            if ($prod_check) {
                if (StationeryCart::where('stationeryprod_id', $product_id)->where('user_id', Auth::id())->exists()) {
                    return response()->json(['status' => $prod_check->name . "Already Added to cart"]);
                } else {
                    $cartItem = new StationeryCart();
                    $cartItem->stationeryprod_id = $product_id;
                    $cartItem->user_id = Auth::id();
                    $cartItem->stationeryprod_qty = $product_qty;
                    $cartItem->save();
                    return response()->json(['status' => $prod_check->name . "Added to cart"]);
                }
            }
        } else {
            return response()->json(['status' => "Login to continue"]);
        }
    }
    public function viewcart()
    {
        $cartitems=StationeryCart::where('user_id',Auth::id())->get();
        return view('stationeryfrontend.cart',compact('cartitems'));
        
    }
    public function updatecart(Request $request){
        $prod_id=$request->input('prod_id');
        $product_qty=$request->input('prod_qty');
        if(Auth::check()){
            if(StationeryCart::where('stationeryprod_id',$prod_id)->where('user_id',Auth::id())->exists()){
                $cart=StationeryCart::where('stationeryprod_id',$prod_id)->where('user_id',Auth::id())->first();
                $cart->stationeryprod_qty=$product_qty;
                $cart->update();
                return response()->json(['status'=>"Quantity Updated"]);
            }
        }
    }
    public function deleteProduct(Request $request)
    {
        if (Auth::check()) {
            $prod_id = $request->input('prod_id');
            if (StationeryCart::where('stationeryprod_id', $prod_id)->where('user_id', Auth::id())->exists()) {
                $cartItem = StationeryCart::where('stationeryprod_id', $prod_id)->where('user_id', Auth::id())->first();
                $cartItem->delete();
                return response()->json(['status' => "Product deleted successfully!"]);
            }
        } else {
            return response()->json(['status' => "Login to continue further!"]);
        }
    }   
}
