<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\RestaurantResource;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RestaurantController extends Controller
{
    use ApiResponseTrait;
    public function index(){
        $restaurants = RestaurantResource::collection(Restaurant::get());
        return $this->apiResponse($restaurants,'successful',200);
    }

    public function show($id){
        $restaurant = Restaurant::find($id);
        if($restaurant){
            return $this->apiResponse($restaurant,'success',200);
        }
            return $this->apiResponse(null,'not found',404);
    }

    public function store(Request $request){
        $validator =Validator::make($request->all(),[
            'name'=>'required|min:2|max:255',
            'description'=>'nullable|max:255',
            'adress'=>'required|string|max:255',
            'phone'=>'required|string|max:15',
            'openingHours'=>'required|integer|min:1|max:24',
            'rating'=> 'required|regex:/^\d+(\.\d+)?$/|min:1|max:5',
            'image'=> 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if($validator->fails()){
            return $this->apiResponse(null,$validator->errors(),400);
        }

        $restaurant = new Restaurant();
        $restaurant->name = $request->name;
        $restaurant->description = $request->description;
        $restaurant->adress = $request->adress;
        $restaurant->phone = $request->phone;
        $restaurant->openingHours = $request->openingHours;
        $restaurant->rating = $request->rating;

        if($request->hasFile('image')){
            $imageName = $request->file('image')->getClientOriginalName();
            $imageDateTime = now()->format('Y-m-d_H-i-s');
            $imageName = $imageDateTime.'-'.$imageName;
            $request->file('image')->storeAs('public/images',$imageName);
            $restaurant->image = $imageName;
        }
        
        $restaurant->save();

        if($restaurant){
            return $this->apiResponse(new RestaurantResource($restaurant),'success',200);
        }
            return $this->apiResponse(null,'not saved!',400);

    }

    public function update(Request $request,$id){
        $validator =Validator::make($request->all(),[
            'name'=>'required|min:2|max:255',
            'description'=>'nullable|max:255',
            'adress'=>'required|string|max:255',
            'phone'=>'required|string|max:15',
            'openingHours'=>'required|integer|min:1|max:24',
            'rating'=> 'required|regex:/^\d+(\.\d+)?$/|min:1|max:5',
            'image'=> 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if($validator->fails()){
            return $this->apiResponse(null,$validator->errors(),400);
        }
        $restaurant = Restaurant::findOrFail($id);

        if(! $restaurant){
            return $this->apiResponse(null,'not found',404); 
         }

        $restaurant->name = $request->name;
        $restaurant->description = $request->description;
        $restaurant->adress = $request->adress;
        $restaurant->phone = $request->phone;
        $restaurant->openingHours = $request->openingHours;
        $restaurant->rating = $request->rating;

        if($request->hasFile('image')){
            $imageName = $request->file('image')->getClientOriginalName();
            $imageDateTime = now()->format('Y-m-d_H-i-s');
            $imageName = $imageDateTime.'-'.$imageName;
            $request->file('image')->storeAs('public/images',$imageName);
            $restaurant->image = $imageName;
        }
        
        $restaurant->save();

        if($restaurant){
            return $this->apiResponse(new RestaurantResource($restaurant),'success',200);
        }
            return $this->apiResponse(null,'Update failed',404);
    }

    public function destroy($id){
        $restaurant = Restaurant::find($id);

        if(! $restaurant){
            return $this->apiResponse(null,'not found',404);
        }
         $restaurant->delete($id);

         if($restaurant){
            return $this->apiResponse(null,'successfuly deleted',200);
        }
    }
}
