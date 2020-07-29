<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserLogin;
use Illuminate\Http\Request;
use App\Http\Requests\UserSignup;
use App\User;
class UserController extends Controller
{
    public function processLogin(UserLogin $request){
if(User::loginUser($request)){
    return redirect('shop');
}
return redirect('login')->with('status-fail', 'כתובת המייל או הסיסמא אינם נכונים..');
    }
    public function displayLogin(){
        return view('user.login');
    }
    public function processSignup(UserSignup $request){
        User::store($request);
        return redirect('login');
    }
    public function displaySignup(){
        return view('user.signup');
    }
}
