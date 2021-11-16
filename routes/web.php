<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'App\Http\Controllers\FrontendController@welcome');
Route::get('/about', 'App\Http\Controllers\FrontendController@about');
Route::get('/shop', 'App\Http\Controllers\FrontendController@shop');
Route::get('/blog', 'App\Http\Controllers\FrontendController@blog');
Route::get('/contact', 'App\Http\Controllers\FrontendController@contact');
Route::get('/cart', 'App\Http\Controllers\FrontendController@cart');
Route::get('/product/details/{pd}', 'App\Http\Controllers\FrontendController@productdetails');
Route::get('/category/product/{cp}', 'App\Http\Controllers\FrontendController@categoryproduct');
Route::get('/add/to/cart/{atoc}', 'App\Http\Controllers\AddCartController@addtocart');
Route::get('/remove/{re}', 'App\Http\Controllers\AddCartController@remove');
Route::get('/clear/cart', 'App\Http\Controllers\AddCartController@clearcart');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard','App\Http\Controllers\BackendController@dashboard')->name('dashboard');
Route::middleware(['auth:sanctum', 'verified'])->get('/add/product','App\Http\Controllers\ProductController@addproduct');
Route::middleware(['auth:sanctum', 'verified'])->post('/insert/product','App\Http\Controllers\ProductController@insertproduct');
Route::middleware(['auth:sanctum', 'verified'])->post('/edit/product','App\Http\Controllers\ProductController@editproduct');
Route::middleware(['auth:sanctum', 'verified'])->get('/delete/{pd}','App\Http\Controllers\ProductController@productdelete');
Route::middleware(['auth:sanctum', 'verified'])->get('/edit/{pe}','App\Http\Controllers\ProductController@productedit');

Route::middleware(['auth:sanctum', 'verified'])->get('/add/category','App\Http\Controllers\CategoryController@addcategory');
Route::middleware(['auth:sanctum', 'verified'])->post('/insert/category','App\Http\Controllers\CategoryController@insertcategory');
