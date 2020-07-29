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

Route::get('add-to-cart/{product_id}', 'CartController@addToCart');
Route::post('add-to-cart', 'CartController@addToCartByQty');
Route::get('cart', 'CartController@displayCart');
Route::post('update-cart', 'CartController@updateCart');
Route::get('delete-item/{rowId}', 'CartController@deleteItem');
Route::get('delete-cart', 'CartController@deleteCart');

Route::get('signup', 'UserController@displaySignup');
Route::post('signup', 'UserController@processSignup');
Route::get('login', 'UserController@displayLogin');
Route::post('login', 'UserController@processLogin');
