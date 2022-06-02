<?php

namespace App\Http\Controllers;

use App\Models\CustomerLogin;
use Illuminate\Http\Request;
use Socialite;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class FacebookController extends Controller
{
    function RedirectToProvider(){
        return Socialite::driver('facebook')->redirect();
    }

    function RedirectToWebsite(){
        $user = Socialite::driver('facebook')->user();

        if(CustomerLogin::where('email', $user->getEmail())->exists()){
            if(Auth::guard('customerlogin')->attempt(['email'=>$user->getEmail(), 'password'=>'@abc123'])){
                return redirect('/');
            }
        }
        else{
            CustomerLogin::create([
                'name'=>$user->getName(),
                'email'=>$user->getEmail(),
                'password'=>bcrypt('@abc123'),
                'created_at'=>Carbon::now(),
            ]);
    
            if(Auth::guard('customerlogin')->attempt(['email'=>$user->getEmail(), 'password'=>'@abc123'])){
                return redirect('/');
            }
        }
    }
}
