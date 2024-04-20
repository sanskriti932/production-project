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
    public function product(){
        $product=StationeryProduct::where('status','0')->get();
        return view('stationeryfrontend.product',compact('product'));
    }
    public function viewcategory($slug){
        if(StationeryCategory::where('slug',$slug)->exists()){
            $category=StationeryCategory::where('slug',$slug)->first();
            $products=StationeryProduct::where('stationerycate_id',$category->id)->where('status','0')->get();
            return view('stationeryfrontend.products.index',compact('category','products'));
        }else{
            return redirect('stationeryhome')->with('status',"Slug doesnot exist!");
        }
    }
    public function productview($cate_slug,$prod_slug){
        if(StationeryCategory::where('slug',$cate_slug)->exists()){
            if(StationeryProduct::where('slug',$prod_slug)->exists()){
                $products = StationeryProduct::where('slug',$prod_slug)->first();
                return view('stationeryfrontend.products.view',compact('products'));
            }
            else{
                return redirect('stationeryhome')->with('status',"Broken link encountered!");
            }
        }else{
            return redirect('stationeryhome')->with('status',"Broken link encountered!");
        }  
    }
    public function productonlyview($prod_slug){
        if(StationeryProduct::where('slug',$prod_slug)->exists()){
            $products = StationeryProduct::where('slug',$prod_slug)->first();
            return view('stationeryfrontend.products.view',compact('products'));
        }
        else{
            return redirect('stationeryhome')->with('status',"Broken link encountered!");
        } 
    }
    public function search(Request $request){
        $data=StationeryProduct::where('name','like','%'.$request->input('query').'%')->get();
        return view('stationeryfrontend.search',['products'=>$data]);
    }
}
