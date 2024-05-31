<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ReviewResource;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ReviewController extends Controller
{
    use ApiResponseTrait;
    public function index(){
        $reviews = ReviewResource::collection(Review::get());
        return $this->apiResponse($reviews,'successful',200);
    }

    public function show($id){
        $review = Review::find($id);
        if($review){
            return $this->apiResponse($review,'success',200);
        }
            return $this->apiResponse(null,'not found',404);
    }

    public function store(Request $request){
        $validator =Validator::make($request->all(),[
            'user_id'=>'required|exists:users,id',
            'restaurant_id'=>'required|exists:restaurants,id',
            'comment'=> 'required|string|min:5|max:255',
            'rating'=> 'required|regex:/^\d+(\.\d+)?$/|min:1|max:5',
        ]);

        if($validator->fails()){
            return $this->apiResponse(null,$validator->errors(),400);
        }

        $review = new Review();
        $review->user_id = $request->user_id;
        $review->restaurant_id = $request->restaurant_id;
        $review->comment = $request->comment;
        $review->rating = $request->rating;
    
        $review->save();

        if($review){
            return $this->apiResponse(new ReviewResource($review),'success',200);
        }
            return $this->apiResponse(null,'not saved!',400);
    }

    public function update(Request $request,$id){
        $validator =Validator::make($request->all(),[
            'user_id'=>'required|exists:users,id',
            'restaurant_id'=>'required|exists:restaurants,id',
            'comment'=> 'required|string|min:5|max:255',
            'rating'=> 'required|regex:/^\d+(\.\d+)?$/|min:1|max:5',
        ]);

        if($validator->fails()){
            return $this->apiResponse(null,$validator->errors(),400);
        }

        $review= Review::findOrFail($id);

        if(! $review){
            return $this->apiResponse(null,'not found',404); 
         }

        $review->user_id = $request->user_id;
        $review->restaurant_id = $request->restaurant_id;
        $review->comment = $request->comment;
        $review->rating = $request->rating;
    
        $review->save();

        if($review){
            return $this->apiResponse(new ReviewResource($review),'success',200);
        }
            return $this->apiResponse(null,'Update failed',404);
    }

    public function destroy($id){
        $review = Review::find($id);

        if(! $review){
            return $this->apiResponse(null,'not found',404);
        }
         $review->delete($id);

         if($review){
            return $this->apiResponse(null,'successfuly deleted',200);
        }
        
    }
}
