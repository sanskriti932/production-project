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
    public function add(){
        $category = StationeryCategory::all();
        return view('stationeryadmin.stationeryproduct.add',compact('category'));
    }

    public function insert(Request $request){
        $products = new StationeryProduct();
        if($request->hasFile('image')){
            $file=$request->file('image');
            $ext=$file->getClientOriginalExtension();
            $filename=time().'.'.$ext;
            $file->move('assets/uploads/stationeryproduct',$filename);
            $products->image=$filename;
        }
        $products->stationerycate_id=$request->input('stationerycate_id');
        $products->name=$request->input('name');
        $products->slug=$request->input('slug');
        $products->small_description=$request->input('small_description');
        $products->description=$request->input('description');
        $products->original_price=$request->input('original_price');
        $products->selling_price=$request->input('selling_price');
        $products->tax=$request->input('tax');
        $products->qty=$request->input('qty');
        $products->status=$request->input('status')==TRUE?'1':'0';
        $products->trending=$request->input('trending')==TRUE?'1':'0';
        $products->meta_title=$request->input('meta_title');
        $products->meta_keywords=$request->input('meta_keywords');
        $products->meta_description=$request->input('meta_description');
        $products->save();
        return redirect('stationeryproducts')->with('status',"Product Added Sucessfully!");
    }

}
