<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Image;

class ProfileController extends Controller
{
    function profile(){
        return view('admin.profile.edit');
    }

    function update(Request $request){
        User::find(Auth::id())->update([
            'name'=>$request->name,
        ]);
        return back();
    }

    function password_update(Request $request){
        $request->validate([
            'password'=>'required',
            'password'=>'confirmed',
            'password'=>Password::min(8)
                    ->letters()
                    ->mixedCase()
                    ->numbers()
                    ->symbols(),
        ]);

        if(Hash::check($request->old_password, Auth::user()->password)){
            User::find(Auth::id())->update([
                'password'=>bcrypt($request->password),
            ]);
            return back()->with('update_pass', 'Password Updated!');
        }
        else{
            return back()->with('old_pass', 'Old Password Incorrect');
        }
    }

    function photochange(Request $request){
        $request->validate([
            'photo'=>'image',
            'photo'=>'file|max:5000',
        ]);
        $new_profile_photo = $request->photo;
        $extension = $new_profile_photo->getClientOriginalExtension();
        $new_name = Auth::id().'.'.$extension;

        if(Auth::user()->photo != 'default.png'){
            $path = public_path()."/uploads/users/".Auth::user()->photo;
            unlink($path);
        }
        
        Image::make($new_profile_photo)->resize(400, 400)->save(base_path('public/uploads/users/'.$new_name));
        User::find(Auth::id())->update([
            'photo'=>$new_name,
        ]);
        return back();
    }
}
