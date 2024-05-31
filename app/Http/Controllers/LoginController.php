<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function show(){
        return view('pages.login.show');
    }

    public function login(Request $request){
        
        $request->validate([
            'email'=>'required|email',
            'password'=>'required',
        ]);
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
            $request->session()->regenerate();
            return redirect()->intended('/home');
        }
        throw ValidationException::withMessages([
            'email'=>[trans('auth.failed')],
        ]);
    }

    public function logout(Request $request){
         Auth::logout();
         $request->session()->invalidate();
         $request->session()->regenerateToken();

         return redirect('/');
    }
}
