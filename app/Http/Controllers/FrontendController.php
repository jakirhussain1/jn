<?php

namespace App\Http\Controllers;
use App\Models\ProductModel;
use App\Models\CategoryModel;
use App\Models\AddCartModel;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    function welcome(){
        $all_product = ProductModel::take(4)->orderBy('id','DESC')->get();
        $all_products = ProductModel::all();
        return view('welcome',compact('all_product','all_products'));
    }
    function about(){
        return view('frontend_view.about');
    }
    function shop(){
        $all_category = CategoryModel::all();
        $all_product = ProductModel::all();
        return view('frontend_view.shop',compact('all_product','all_category'));
    }
    function blog(){
        return view('frontend_view.blog');
    }
    function contact(){
        return view('frontend_view.contact');
    }
    function cart(){
        $user_ip = ($_SERVER['REMOTE_ADDR'] );
        $add_cart = AddCartModel::where('user_ip',$user_ip )->get();
        return view('frontend_view.cart',compact('add_cart'));
    }
    function productdetails($pd){
        $category_id = ProductModel::find($pd)->category_id;
        $single_product = ProductModel::find($pd);
        $multi_product = ProductModel::where('id', '!=', $pd)->where('category_id', $category_id)->get();
        return view('frontend_view.product_details',compact('single_product','multi_product'));
    }
    function categoryproduct($cp){
        $unique_category = ProductModel::where('category_id',$cp)->get();
        $all_category = CategoryModel::all();
        return view('category.category_product',compact('all_category','unique_category'));
    }
}
