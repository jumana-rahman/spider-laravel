<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    function category(){
        $categories = Category::all();
        return view('admin.category.index', [
            'categories'=>$categories,
        ]);
    }
    function insert(CategoryRequest $request){

        Category::insert([
            'category_name'=>$request->category_name,
            'added_by'=>Auth::id(),
            'created_at'=>carbon::now(),
        ]);
        return back()->with('success', 'Category Added!');
    }

    function delete($category_id){
        Category::find($category_id)->delete();
        return back()->with('delete', 'Yaaayyyy!!! Category Deleted');
    }
    function edit($category_id){
        $edit_category = Category::find($category_id);
        return view('admin.category.edit', [
            'edit_category'=> $edit_category,
        ]);
    }
    function update(CategoryRequest $request){
        Category::where('id', $request->category_id)->update([
            'category_name'=>$request->category_name,
            'updated_at'=>Carbon::now(),
        ]);
        return back()->with('update', 'Category Updated!');
    }
}
