<?php

namespace App\Http\Controllers\CafeFrontend;

use App\Http\Controllers\Controller;
use App\Models\CafeCategory;
use App\Models\CafeProduct;
use Illuminate\Http\Request;

class CafeFrontendController extends Controller
{
    public function index(){
        $featured_products=CafeProduct::where('trending',1)->take(5)->get();
        $trending_category=CafeCategory::where('popular',1)->take(7)->get();
        return view('cafefrontend.index',compact('featured_products','trending_category'));
    }

    public function category(){
        $category=CafeCategory::where('status','0')->get();
        return view('cafefrontend.category',compact('category'));
    }

    public function viewcategory($slug){
        if(CafeCategory::where('slug',$slug)->exists()){
            $category=CafeCategory::where('slug',$slug)->first();
            $products=CafeProduct::where('cafecate_id',$category->id)->where('status','0')->get();
            return view('cafefrontend.products.index',compact('category','products'));
        }else{
            return redirect('cafehome')->with('status',"Slug doesnot exist!");
        }
    }
    public function productview($cate_slug,$prod_slug){
        if(CafeCategory::where('slug',$cate_slug)->exists()){
            if(CafeProduct::where('slug',$prod_slug)->exists()){
                $products = CafeProduct::where('slug',$prod_slug)->first();
                return view('cafefrontend.products.view',compact('products'));
            }
            else{
                return redirect('cafehome')->with('status',"Broken link encountered!");
            }
        }else{
            return redirect('cafehome')->with('status',"Broken link encountered!");
        }  
    }
}
