<?php

namespace App\Http\Controllers;
use App\Models\ProductModel;
use App\Models\CategoryModel;
use Toastr;
use Image;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    function addproduct(){
        $all_category = CategoryModel::all();
        $all_product = ProductModel::paginate(4);
        return view('product.add_product',compact('all_product','all_category'));
    }
    function insertproduct(Request $request){
        $request->validate([
            'product_name'=> 'required',
            'product_price'=> 'required|numeric',
            'product_quantity'=> 'required|numeric',
            'quantity_alerts'=> 'required|numeric',
            'product_details'=> 'required',
        ]);
       $product_id =  ProductModel::insertGetId([
             'product_name'=> $request->product_name,
             'category_id'=> $request->category_id,
             'product_price'=> $request->product_price,
             'product_quantity'=> $request->product_quantity,
             'quantity_alerts'=> $request->quantity_alerts,
             'product_details'=> $request->product_details,
             
        ]);
        if($request->hasFile('product_image')){
            $main_image = $request->product_image;
            $extension = $main_image->getClientOriginalExtension();
            $final = time(). '.' .$extension;
            Image::make($main_image)->resize(250,250)->save(base_path('Public/product_image/' .$final));
            ProductModel::find($product_id)->update([
              'product_image' => $final,
            ]);
        }
        Toastr::success('Product Added Success', 'Successfully!', ["positionClass" => "toast-top-right"]);
        return back();
        
    }
    function productdelete($pd){
        $old =  ProductModel::find($pd)->product_image;
        if($old!= 'product.jpg')
        {
          unlink(base_path('Public/product_image/'.$old));  
        }
        ProductModel::find($pd)->delete();
         Toastr::warning('Product Deleted Success', 'Successfully!', ["positionClass" => "toast-top-right"]);
        return back();
    }
    function productedit($pe){
        $all_category = CategoryModel::all();
        $product_edit = ProductModel::find($pe);
        return view('product.product_edit',compact('product_edit','all_category'));
    }
    function editproduct(Request $request){
        ProductModel::find($request->product_id)->update([
             'product_name'=> $request->product_name,
             'category_id'=> $request->category_id,
             'product_price'=> $request->product_price,
             'product_quantity'=> $request->product_quantity,
             'quantity_alerts'=> $request->quantity_alerts,
             'product_details'=> $request->product_details,
        ]);
        if($request->hasFile('product_image')){
           $old =  ProductModel::find($request->product_id)->product_image;
            if($old !=  'product.jpg'){
                unlink(base_path('Public/product_image/'.$old));
            }
            $main_image = $request->product_image;
            $extension = $main_image->getClientOriginalExtension();
            $final = time(). '.' .$extension;
            Image::make($main_image)->resize(250,250)->save(base_path('Public/product_image/' .$final));
            ProductModel::find($request->product_id)->update([
              'product_image' => $final,
            ]);
        }
        Toastr::success('Product Updated Success', 'Successfully!', ["positionClass" => "toast-top-right"]);
        return back();
    }
}
