<?php

namespace App\Http\Controllers;
use App\Models\CategoryModel;
use Toastr;
use Carbon\Carbon;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    function addcategory(){
        $all_category = CategoryModel::paginate(4);
        return view('category.add_category',compact('all_category'));
    }
    function insertcategory(Request $request){
        $request->validate([
           'category_name' => 'required|unique:category_models,category_name'
        ]);
       CategoryModel::insert([
           'category_name' => $request->category_name,
           'created_at'=> Carbon::now(),
       ]);
       Toastr::success('Category Added Success', 'Successfully!', ["positionClass" => "toast-top-right"]);
       return back();
    }
}
