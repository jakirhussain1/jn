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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard','App\Http\Controllers\BackendController@dashboard')->name('dashboard');
