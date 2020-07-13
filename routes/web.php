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

Route::view('/','pages.home');
Route::view('about','pages.about');
Route::get('shop','ShopController@displayShop');
Route::get('shop/{category}','ShopController@displayCategory');
Route::get('shop/{category}/{product}','ShopController@displayProduct');


