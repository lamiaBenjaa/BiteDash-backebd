<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\DishResource;
use App\Models\Dish;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DishController extends Controller
{
    use ApiResponseTrait;
    public function index(){
        $dishes = DishResource::collection(Dish::get());
        return $this->apiResponse($dishes,'successful',200);
    }

    public function show($id){
        $dish = Dish::find($id);
        if($dish){
            return $this->apiResponse($dish,'success',200);
        }
            return $this->apiResponse(null,'not found',404);
    }

    public function store(Request $request){
        $validator =Validator::make($request->all(),[
            'name'=>'required|min:2|max:255',
            'description'=>'nullable|max:255',
            'price' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'image'=> 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'restaurant_id' =>'required|exists:restaurants,id',
            'categorie_id' =>'required|exists:categories,id',
        ]);

        if($validator->fails()){
            return $this->apiResponse(null,$validator->errors(),400);
        }
        $dish = new Dish();
        $dish->name = $request->name;
        $dish->description = $request->description;
        $dish->price = $request->price;
        $dish->restaurant_id = $request->restaurant_id;
        $dish->categorie_id = $request->categorie_id;

        if($request->hasFile('image')){
            $imageName = $request->file('image')->getClientOriginalName();
            $imageDateTime = now()->format('Y-m-d_H-i-s');
            $imageName = $imageDateTime.'-'.$imageName;
            $request->file('image')->storeAs('public/images',$imageName);
            $dish->image = $imageName;
        }
        
        $dish->save();

        if($dish){
            return $this->apiResponse(new DishResource($dish),'success',200);
        }
            return $this->apiResponse(null,'not saved!',400);
    }

    public function update(Request $request,$id){
        $validator =Validator::make($request->all(),[
            'name'=>'required|min:2|max:255',
            'description'=>'nullable|max:255',
            'price' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'image'=> 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'restaurant_id' =>'required|exists:restaurants,id',
            'categorie_id' =>'required|exists:categories,id',
        ]);

        if($validator->fails()){
            return $this->apiResponse(null,$validator->errors(),400);
        }

        $dish = Dish::find($id);

        if(! $dish){
            return $this->apiResponse(null,'not found',404); 
         }

        $dish->name = $request->name;
        $dish->description = $request->description;
        $dish->price = $request->price;
        $dish->restaurant_id = $request->restaurant_id;
        $dish->categorie_id = $request->categorie_id;

        if($request->hasFile('image')){
            $imageName = $request->file('image')->getClientOriginalName();
            $imageDateTime = now()->format('Y-m-d_H-i-s');
            $imageName = $imageDateTime.'-'.$imageName;
            $request->file('image')->storeAs('public/images',$imageName);
            $dish->image = $imageName;
        }
        
        $dish->save();

        if($dish){
            return $this->apiResponse(new DishResource($dish),'success',200);
        }
            return $this->apiResponse(null,'Update failed',404);

    }

    public function destroy($id){
        $dish = Dish::find($id);
        
        if(! $dish){
            return $this->apiResponse(null,'not found',404);
        }
         $dish->delete($id);

         if($dish){
            return $this->apiResponse(null,'successfuly deleted',200);
        }
    }
}
