<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserSignup;
use App\User;
use App\Http\Requests\UserLogin;


class UserController extends Controller {

    public function logout(Request $request){
        $name = session('name');
        $request->session()->flush();
        return redirect('shop')->with('status', 'תודה שנכנסת לאתר זה ' . $name);
    }
    public function processLogin(UserLogin $request) {
        if (User::loginUser($request)) {
            if(session('place-order-process')){

                return redirect('place-order');
            }
            return redirect('shop')->with('status', 'שלום וברכה '. ucfirst(session('name')). ',תהנה');
        }
        return redirect('login')->with('status-fail', 'כתובת המייל או הסיסמא אינם נכונים..');
    }

    public function displayLogin() {
        return view('user.login');
    }

    public function processSignup(UserSignup $request) {
        User::store($request);
        return redirect('login');
    }

    public function displaySignup() {
        return view('user.signup');
    }

}
