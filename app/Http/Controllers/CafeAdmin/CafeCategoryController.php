<?php

namespace App\Http\Controllers\CafeAdmin;

use App\Http\Controllers\Controller;
use App\Models\CafeCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CafeCategoryController extends Controller
{
    public function index(){
        $category=CafeCategory::all();
        return view('cafeadmin.cafecategory.index',compact('category'));
    }

    public function add(){
        return view('cafeadmin.cafecategory.add');
    }
    public function insert(Request $request){
        $category = new CafeCategory();
        if($request->hasFile('image')){
            $file=$request->file('image');
            $ext=$file->getClientOriginalExtension();
            $filename=time().'.'.$ext;
            $file->move('assets/uploads/cafecategory',$filename);
            $category->image=$filename;
        }

        $category->name=$request->input('name');
        $category->slug=$request->input('slug');
        $category->description=$request->input('description');
        $category->status=$request->input('status')==TRUE ? '1':'0';
        $category->popular=$request->input('popular') ==TRUE ? '1':'0';
        $category->meta_title=$request->input('meta_title');
        $category->meta_keywords=$request->input('meta_keywords');
        $category->meta_description=$request->input('meta_description');
        $category->save();
        return redirect('/cafedashboard')->with('status',"Category Added Successfully!");
    }
    public function edit($id){
        $category=CafeCategory::find($id);
        return view('cafeadmin.cafecategory.edit',compact('category'));
    }

    public function update(Request $request, $id){
        $category = CafeCategory::find($id);
        if($request->hasFile('image')){
            $path = 'assets/uploads/cafecategory'.$category->image;
            if(File::exists($path)){
                File::delete($path);
            }
            $file=$request->file('image');
            $ext=$file->getClientOriginalExtension();
            $filename=time().'.'.$ext;
            $file->move('assets/uploads/cafecategory',$filename);
            $category->image=$filename;
        }
        $category->name=$request->input('name');
        $category->slug=$request->input('slug');
        $category->description=$request->input('description');
        $category->status=$request->input('status')==TRUE ? '1':'0';
        $category->popular=$request->input('popular') ==TRUE ? '1':'0';
        $category->meta_title=$request->input('meta_title');
        $category->meta_keywords=$request->input('meta_keywords');
        $category->meta_description=$request->input('meta_description');
        $category->update();
        return redirect('/cafedashboard')->with('status',"Cafe Category updated sucessfully!");
    }

    public function destroy($id){
        $category = CafeCategory::find($id);
        if($category->image){
            $path = 'assets/uploads/cafecategory'.$category->image;
            if(File::exists($path)){
                File::delete($path);
            }
        }
        $category->delete();
        return redirect('cafecategories')->with('status',"Category Deleted Successfully!");
    }
}
