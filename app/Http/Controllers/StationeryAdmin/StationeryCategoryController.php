<?php

namespace App\Http\Controllers\StationeryAdmin;

use App\Http\Controllers\Controller;
use App\Models\StationeryCategory;
use Illuminate\Http\Request;

class StationeryCategoryController extends Controller
{
    public function index(){
        $category=StationeryCategory::all();
        return view('stationeryadmin.stationerycategory.index',compact('category'));
    }

    public function add(){
        return view('stationeryadmin.stationerycategory.add');
    }

    public function insert(Request $request){
        $category = new StationeryCategory();
        if($request->hasFile('image')){
            $file=$request->file('image');
            $ext=$file->getClientOriginalExtension();
            $filename=time().'.'.$ext;
            $file->move('assets/uploads/stationerycategory',$filename);
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
        return redirect('/stationerydashboard')->with('status',"Category Added Successfully!");
    }
}
