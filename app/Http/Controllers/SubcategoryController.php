<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubcategoryRequest;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;
use Carbon\Carbon;

class SubcategoryController extends Controller
{
    function index(){
        $categories = Category::all();
        $subcategories = Subcategory::all();
        $trashed = Subcategory::onlyTrashed()->get();
        return view('admin.subcategory.index', [
            'categories'=> $categories,
            'subcategories'=> $subcategories,
            'trashed'=> $trashed,
        ]);
    }

    function insert(SubcategoryRequest $request){
        if(Subcategory::withTrashed()->where('category_id', $request->category_id)->where('subcategory_name', $request->subcategory_name)->exists()){
            return back()->with('exist', 'This Field Already Exists in this Category');
        }
        else{
            Subcategory::insert([
                'category_id'=>$request->category_id,
                'subcategory_name'=>$request->subcategory_name,
                'created_at'=>Carbon::now(),
            ]);
            return back()->with('success', 'Subcategory Added!');
        } 
    }

    function edit($subcategory_id){
        $subcategories = Subcategory::find($subcategory_id);
        $categories = Category::all();
        return view('admin.subcategory.edit', [
            'subcategories'=>$subcategories,
            'categories'=>$categories,
        ]);
    }

    function delete($subcategory_id){
        Subcategory::find($subcategory_id)->delete();
        return back();
    }

    function restore($subcategory_id){
        Subcategory::onlyTrashed()->find($subcategory_id)->restore();
        return back();
    }

    function p_delete($subcategory_id){
        Subcategory::onlyTrashed()->find($subcategory_id)->forceDelete();
        return back();
    }
}
