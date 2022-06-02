<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerLoginController extends Controller
{
    function customer_login(Request $request){
        if(Auth::guard('customerlogin')->attempt(['email' => $request->email, 'password' => $request->password])){
            return redirect('/');
        }
        else{
            return redirect('/register');
        }
    }

    function customer_logout(Request $request){
        Auth::guard('customerlogin')->logout();
        return redirect('/');
    }
}
