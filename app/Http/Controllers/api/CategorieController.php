<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategorieResource;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategorieController extends Controller
{
    use ApiResponseTrait;
    public function index(){
        $categories = CategorieResource::collection(Categorie::get());
        return $this->apiResponse($categories,'successfuly get all',200);
    }

    public function show($id){
        $categorie = Categorie::find($id);

        if($categorie){
            return $this->apiResponse($categorie,'succes',200);
           }
            return $this->apiResponse(null,'not found',404);
    }

    public function store(Request $request){

        $validator = Validator::make($request->all(),[
            "name"=>'required|min:2|max:255',
          'image'=> 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if($validator->fails()){
            return $this->apiResponse(null,$validator->errors(),400);
        }
        
        $categorie = new Categorie();
        $categorie->name = $request->name;
        
        if($request->hasFile('image')){
            $imageName = $request->file('image')->getClientOriginalName();
            $imageDateTime = now()->format('Y-m-d_H-i-s');
            $imageName = $imageDateTime.'-'.$imageName;
            $request->file('image')->storeAs('public/images',$imageName);
            $categorie->image = $imageName;
        }
          
        $categorie->save();
        if($categorie){
           return $this->apiResponse(new CategorieResource($categorie),'added successfuly',200);
        }
           return $this->apiResponse(null,'failed',400);
           
    }

    public function update(Request $request,$id){
        $validator = Validator::make($request->all(),[
            "name"=>'required|min:2|max:255',
            'image'=> 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if($validator->fails()){
            return $this->apiResponse(null,$validator->errors(),400);
        }

       $categorie = Categorie::find($id);

       if(! $categorie){
          return $this->apiResponse(null,'not found',404); 
       }
        
       $categorie->name = $request->name;
          
          if($request->hasFile('image')){
              $imageName = $request->file('image')->getClientOriginalName();
              $imageDateTime = now()->format('Y-m-d_H-i-s');
              $imageName = $imageDateTime.'-'.$imageName;
              $request->file('image')->storeAs('public/images',$imageName);
              $categorie->image = $imageName;
          }
  
          $categorie->save();

          if($categorie){
             return $this->apiResponse(new CategorieResource($categorie),'updated succesfully',200);
          }
             return $this->apiResponse(null,'failed',400);
    }

    public function destroy($id){
        $categorie = Categorie::find($id);

        if(! $categorie){
            return $this->apiResponse(null,'not found',404); 
         }
         $categorie->delete($id);

         if($categorie){
            return $this->apiResponse(null,'deleted successfuly',200); 
         }
    }
}
