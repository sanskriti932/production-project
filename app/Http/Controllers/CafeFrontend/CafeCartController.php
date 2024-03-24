<?php

namespace App\Http\Controllers\CafeFrontend;

use App\Http\Controllers\Controller;
use App\Models\CafeCart;
use App\Models\CafeProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CafeCartController extends Controller
{
    public function addProduct(Request $request)
    {
        $product_id = $request->input('product_id');
        $product_qty = $request->input('product_qty');
        if (Auth::check()) {
            $prod_check = CafeProduct::where('id', $product_id)->first();
            if ($prod_check) {
                if (CafeCart::where('cafeprod_id', $product_id)->where('user_id', Auth::id())->exists()) {
                    return response()->json(['status' => $prod_check->name . "Already Added to cart"]);
                } else {
                    $cartItem = new CafeCart();
                    $cartItem->cafeprod_id = $product_id;
                    $cartItem->user_id = Auth::id();
                    $cartItem->cafeprod_qty = $product_qty;
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
        $cartitems=CafeCart::where('user_id',Auth::id())->get();
        return view('cafefrontend.cart',compact('cartitems'));
        
    }
    public function deleteProduct(Request $request)
    {
        if (Auth::check()) {
            $prod_id = $request->input('prod_id');
            if (CafeCart::where('cafeprod_id', $prod_id)->where('user_id', Auth::id())->exists()) {
                $cartItem = CafeCart::where('cafeprod_id', $prod_id)->where('user_id', Auth::id())->first();
                $cartItem->delete();
                return response()->json(['status' => "Product deleted successfully!"]);
            }
        } else {
            return response()->json(['status' => "Login to continue further!"]);
        }
    }
}
