<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;

class BackendController extends Controller
{
    function dashboard(){
        $all_user = User::all();
        return view('dashboard',compact('all_user'));
    }
}
