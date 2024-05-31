<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function show(){
        return view('pages.register.show');
    }

    public function register(Request $request){
        
        $request->validate([
            "UserName"=>'required|min:5|max:20',
            "email"=>'required|email|unique:users',
            "password"=>'required|confirmed |min:9|max:30',
            "phone" => 'required|string|max:15',
            "adress" => 'required|string|max:255',
            'image'=> 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);
            $user = new User();
            $user->UserName = $request->UserName;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->phone = $request->phone;
            $user->adress = $request->adress;

            if($request->hasFile('image')){
                $imageName = $request->file('image')->getClientOriginalName();
                $imageDateTime = now()->format('Y-m-d_H-i-s');
                $imageName = $imageDateTime.'-'.$imageName;
                $request->file('image')->storeAs('public/images',$imageName);
                $user->image = $imageName;
            }
            $user->save();
             
            Auth::login($user);
            return redirect()->intended('/home');
    }
}
