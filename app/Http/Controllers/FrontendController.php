<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    function welcome(){
        return view('welcome');
    }
    function about(){
        return view('frontend_view.about');
    }
    function shop(){
        return view('frontend_view.shop');
    }
    function blog(){
        return view('frontend_view.blog');
    }
    function contact(){
        return view('frontend_view.contact');
    }
    function cart(){
        return view('frontend_view.cart');
    }
}
