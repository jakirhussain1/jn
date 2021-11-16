<?php

namespace App\Http\Controllers;
use App\Models\AddCartModel;
use Toastr;
use Illuminate\Http\Request;

class AddCartController extends Controller
{
   function addtocart($atoc){
       $user_ip = ($_SERVER['REMOTE_ADDR'] );
       if(AddCartModel::where('user_ip',$user_ip)->where('product_id',$atoc)->exists()){
           AddCartModel::where('user_ip',$user_ip)->where('product_id',$atoc)->increment('product_quantity', 1);
       }else{
         AddCartModel::insert([
         'user_ip' => $user_ip,
         'product_id'=> $atoc,
       ]);
       }
       Toastr::success('Add Cart Success', 'Successfully!', ["positionClass" => "toast-top-right"]);
      return back();
   }
   function remove($re){
       AddCartModel::find($re)->delete();
       Toastr::success('Product Remove Success', 'Successfully!', ["positionClass" => "toast-top-right"]);
      return back();
   }
   function clearcart(){
       $user_ip = ($_SERVER['REMOTE_ADDR'] );
       AddCartModel::where('user_ip',$user_ip)->delete();
       Toastr::success('Clear Cart Success', 'Successfully!', ["positionClass" => "toast-top-right"]);
      return back();
   }
}
