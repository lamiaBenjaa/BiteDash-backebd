<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\FavoriteResource;
use App\Models\Favorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FavoriteController extends Controller
{
    use ApiResponseTrait;
    public function index(){
        $favorites = FavoriteResource::collection(Favorite::get());
        return $this->apiResponse($favorites,'successful',200);
    }

    public function show($id){
        $favorite = Favorite::find($id);
        if($favorite){
            return $this->apiResponse($favorite,'success',200);
        }
            return $this->apiResponse(null,'not found',404);
    }

    public function store(Request $request){
        $validator =Validator::make($request->all(),[
            'user_id'=>'required|exists:users,id',
            'restaurant_id'=>'required|exists:restaurants,id',
        ]);

        if($validator->fails()){
            return $this->apiResponse(null,$validator->errors(),400);
        }

        $favorite = new Favorite();
        $favorite->user_id = $request->user_id;
        $favorite->restaurant_id = $request->restaurant_id;
    
        $favorite->save();

        if($favorite){
            return $this->apiResponse(new FavoriteResource($favorite),'success',200);
        }
            return $this->apiResponse(null,'not saved!',400);
    }

    public function update(Request $request,$id){
        $validator =Validator::make($request->all(),[
            'user_id'=>'required|exists:users,id',
            'restaurant_id'=>'required|exists:restaurants,id',
        ]);

        if($validator->fails()){
            return $this->apiResponse(null,$validator->errors(),400);
        }
        $favorite= Favorite::findOrFail($id);

        if(! $favorite){
            return $this->apiResponse(null,'not found',404); 
         }

        $favorite->user_id = $request->user_id;
        $favorite->restaurant_id = $request->restaurant_id;
    
        $favorite->save();

        if($favorite){
            return $this->apiResponse(new FavoriteResource($favorite),'success',200);
        }
            return $this->apiResponse(null,'Update failed',404);
    }

    public function destroy($id){
        $favorite = Favorite::find($id);

        if(! $favorite){
            return $this->apiResponse(null,'not found',404);
        }
        $favorite->delete($id);

         if($favorite){
            return $this->apiResponse(null,'successfuly deleted',200);
        }
    }
}
