<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function displayOrders(){
        $date['orders'] = Order::getAll();
        return view('admin.orders', $date);
    }
    public function displayDashboard(){
        return view('admin.main');
    }
}
