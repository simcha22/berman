<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
class ShopController extends Controller
{
    public function displayProduct($cat, $pro){
        $date['product'] = Product::getProduct($cat, $pro);
        return view('shop.product', $date);
    }
    public function displayCategory($slug){
        $date['category'] = Category::getCategory($slug);
        return view('shop.category', $date);
    }
    
    public function displayShop(){
        $date['categories'] = Category::getCategories();
        return view('shop.shop', $date);
    }
    
   
}
