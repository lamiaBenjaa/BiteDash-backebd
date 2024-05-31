<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        $users = User::paginate(10); 
        return view('pages.users.index',compact('users'));
    }
    
    public function create(){
        return view('pages.users.create');
    }

    public function store(Request $request){

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

            return redirect()->route('users.index')->with('success','User created successfuly !');
       
    }

    public function show($id){
        $user = User::findOrFail($id);
       return view('pages.users.show',compact('user'));
    }

    public function edit($id){
       $user = User::findOrFail($id);
       return view('pages.users.edit',compact('user'));
    }

    public function update(Request $request , $id){
        $request->validate([
            "UserName"=>'required|min:5|max:20',
            'email' => 'required|email|unique:users,email,' . $id,
            "passord"=>'nullable|confirmed|min:9|max:30',
            'phone' => 'required|string|max:15',
            "adress" => 'required|string|max:255',
            'image'=> 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);
        

        $user = User::findOrFail($id);
        $user->UserName = $request->UserName;
        $user->email = $request->email;
        if($request->filled('passworde')){
            $user->password = Hash::make($request->password);
        }
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
       
       return redirect()->route('users.index')->with('success','User updated successfuly !');
    }

    public function destroy($id){
        $user = User::findOrFail($id);
        $user->delete();

       return redirect()->route('users.index')->with('success','User deleted successfuly !');
    }
}
