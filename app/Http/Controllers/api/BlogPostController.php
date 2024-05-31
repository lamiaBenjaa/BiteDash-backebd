<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BlogPostResource;
use App\Models\BlogPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator ;

class BlogPostController extends Controller
{
    use ApiResponseTrait;
    public function index(){
        $blogPosts = BlogPostResource::collection(BlogPost::get());
        return $this->apiResponse($blogPosts,'successful',200);
    }

    public function show($id){
        $blogPost = BlogPost::find($id);
        if($blogPost){
            return $this->apiResponse($blogPost,'success',200);
        }
            return $this->apiResponse(null,'not found',404);
    }

    public function store(Request $request){
        $validator =Validator::make($request->all(),[
            'user_id'=>'required|exists:users,id',
            'title'=>'required|string|max:100',
            'content'=> 'required|string|max:255',
        ]);

        if($validator->fails()){
            return $this->apiResponse(null,$validator->errors(),400);
        }
        $blogPost = new BlogPost();
        $blogPost->user_id = $request->user_id;
        $blogPost->title = $request->title;
        $blogPost->content = $request->content;
    
        $blogPost->save();

        if($blogPost){
            return $this->apiResponse(new BlogPostResource($blogPost),'success',200);
        }
            return $this->apiResponse(null,'not saved!',400);
    }

    public function update(Request $request , $id){
        $validator =Validator::make($request->all(),[
            'user_id'=>'required|exists:users,id',
            'title'=>'required|string|max:100',
            'content'=> 'required|string|max:255',
        ]);
        if($validator->fails()){
            return $this->apiResponse(null,$validator->errors(),400);
        }

        $blogPost = BlogPost::find($id);

        if(! $blogPost){
            return $this->apiResponse(null,'not found',404);
        }

        $blogPost->user_id = $request->user_id;
        $blogPost->title = $request->title;
        $blogPost->content = $request->content;
    
        $blogPost->save();

        if($blogPost){
            return $this->apiResponse(new BlogPostResource($blogPost),'success',200);
        }
            return $this->apiResponse(null,'Update failed',404);
               
    }

    public function destroy($id){
        $blogPost = BlogPost::find($id);

        if(! $blogPost){
            return $this->apiResponse(null,'not found',404);
        }
         $blogPost->delete($id);

         if($blogPost){
            return $this->apiResponse(null,'successfuly deleted',200);
        }
        
    }
}
