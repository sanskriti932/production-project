<?php

namespace App\Http\Controllers\CafeAdmin;

use App\Http\Controllers\Controller;
use App\Models\CafeCategory;
use App\Models\CafeProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CafeProductController extends Controller
{
    public function index()
    {
        $products=CafeProduct::all();
        return view('cafeadmin.cafeproduct.index',compact('products'));
    }

    public function add(){
        $category = CafeCategory::all();
        return view('cafeadmin.cafeproduct.add',compact('category'));
    }

    public function insert(Request $request){
        $products = new CafeProduct();
        if($request->hasFile('image')){
            $file=$request->file('image');
            $ext=$file->getClientOriginalExtension();
            $filename=time().'.'.$ext;
            $file->move('assets/uploads/cafeproduct',$filename);
            $products->image=$filename;
        }
        $products->cafecate_id=$request->input('cafecate_id');
        $products->name=$request->input('name');
        $products->slug=$request->input('slug');
        $products->small_description=$request->input('small_description');
        $products->description=$request->input('description');
        $products->original_price=$request->input('original_price');
        $products->selling_price=$request->input('selling_price');
        $products->tax=$request->input('tax');
        $products->qty=$request->input('qty');
        $products->status=$request->input('status')==TRUE?'1':'0';
        $products->trending=$request->input('popular')==TRUE?'1':'0';
        $products->meta_title=$request->input('meta_title');
        $products->meta_keywords=$request->input('meta_keywords');
        $products->meta_description=$request->input('meta_description');
        $products->save();
        return redirect('cafeproducts')->with('status',"Product Added Sucessfully!");
    }
    public function edit($id){
        $products=CafeProduct::find($id);
        return view('cafeadmin.cafeproduct.edit',compact('products'));
    }

    public function update(Request $request, $id){
        $products = CafeProduct::find($id);
        if($request->hasFile('image')){
            $path = 'assets/uploads/cafeproduct/'.$products->image;
            if(File::exists($path)){
                File::delete($path);
            }
            $file=$request->file('image');
            $ext=$file->getClientOriginalExtension();
            $filename=time().'.'.$ext;
            $file->move('assets/uploads/cafeproduct',$filename);
            $products->image=$filename;
        }
        $products->name=$request->input('name');
        $products->slug=$request->input('slug');
        $products->small_description=$request->input('small_description');
        $products->description=$request->input('description');
        $products->original_price=$request->input('original_price');
        $products->selling_price=$request->input('selling_price');
        $products->tax=$request->input('tax');
        $products->qty=$request->input('qty');
        $products->status=$request->input('status')==TRUE?'1' : '0';
        $products->trending=$request->input('trending')==TRUE?'1' : '0';
        $products->meta_title=$request->input('meta_title');
        $products->meta_keywords=$request->input('meta_keywords');
        $products->meta_description=$request->input('meta_description');
        $products->update();
        return redirect('cafeproducts')->with('status',"Cafe Product updated sucessfully!");
    }
    
    public function destroy($id){
        $products = CafeProduct::find($id);
        $path = 'assets/uploads/cafeproduct'.$products->image;
        if(File::exists($path)){
            File::delete($path);
        }
        $products->delete();
        return redirect('cafeproducts')->with('status',"Cafe Product deleted sucessfully!");
    }
}
