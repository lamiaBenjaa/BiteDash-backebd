<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategorieResource;
use App\Http\Resources\UserResource;
use App\Models\Categorie;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    use ApiResponseTrait;
    public function index(){
       $users = UserResource::collection(User::get());
       return $this->apiResponse($users,'successfuly get all',200);
    }

    public function show($id){
       $user = User::find($id);

       if($user){
        return $this->apiResponse($user,'succes',200);
       }
        return $this->apiResponse(null,'not found',404);
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            "UserName"=>'required|min:5|max:20',
            "email"=>'required|email|unique:users',
            "password"=>'required|confirmed |min:9|max:30',
            "phone" => 'required|string|max:15',
            "adress" => 'required|string|max:255',
            'image'=> 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if($validator->fails()){
            return $this->apiResponse(null,$validator->errors(),400);
        }
        
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

        if($user){
           return $this->apiResponse(new UserResource($user),'added successfuly',200);
        }
           return $this->apiResponse(null,'failed',400);
           
    }

    public function update(Request $request,$id){
        $validator = Validator::make($request->all(),[
            "UserName"=>'required|min:5|max:20',
            "email"=>'required|email|unique:users',
            "password"=>'required|confirmed |min:9|max:30',
            "phone" => 'required|string|max:15',
            "adress" => 'required|string|max:255',
            'image'=> 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if($validator->fails()){
            return $this->apiResponse(null,$validator->errors(),400);
        }

        $user = User::findOrFail($id);

        if(! $user){
            return $this->apiResponse(null,'not found',404);
        }

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

          if($user){
             return $this->apiResponse(new UserResource($user),'updated succesfully',200);
          }
             return $this->apiResponse(null,'failed',400);
             

    }

    public function destroy($id){
        $user = User::find($id);

        if(! $user){
            return $this->apiResponse(null,'not found',404);
        }
         $user->delete($id);

         if($user){
            return $this->apiResponse(null,'successfuly deleted',200);
        }
        
    }
}
