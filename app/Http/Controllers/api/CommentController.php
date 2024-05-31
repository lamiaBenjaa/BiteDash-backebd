<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CommentResource;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    use ApiResponseTrait;
    public function index(){
        $comments = CommentResource::collection(Comment::get());
        return $this->apiResponse($comments,'successful',200);
    }

    public function show($id){
        $comment = Comment::find($id);
        if($comment){
            return $this->apiResponse($comment,'success',200);
        }
            return $this->apiResponse(null,'not found',404);
    }

    public function store(Request $request){
        $validator =Validator::make($request->all(),[
            'user_id'=>'required|exists:users,id',
            'post_id'=>'required|exists:blog_posts,id',
            'content'=> 'required|string|max:255',
        ]);

        if($validator->fails()){
            return $this->apiResponse(null,$validator->errors(),400);
        }
        $comment = new Comment();
        $comment->user_id = $request->user_id;
        $comment->post_id = $request->post_id;
        $comment->content = $request->content;
    
        $comment->save();

        if($comment){
            return $this->apiResponse(new CommentResource($comment),'success',200);
        }
            return $this->apiResponse(null,'not saved!',400);
    }

    public function update(Request $request,$id){
        $validator =Validator::make($request->all(),[
            'user_id'=>'required|exists:users,id',
            'post_id'=>'required|exists:blog_posts,id',
            'content'=> 'required|string|max:255',
        ]);

        if($validator->fails()){
            return $this->apiResponse(null,$validator->errors(),400);
        }
        $comment= Comment::findOrFail($id);

        if(! $comment){
            return $this->apiResponse(null,'not found',404);
        }

        $comment->user_id = $request->user_id;
        $comment->post_id = $request->post_id;
        $comment->content = $request->content;
    
        $comment->save();

        if($comment){
            return $this->apiResponse(new CommentResource($comment),'success',200);
        }
            return $this->apiResponse(null,'Update failed',404);
    }


    public function destroy($id){
        $comment= Comment::findOrFail($id);

        if(! $comment){
            return $this->apiResponse(null,'not found',404);
        }

        $comment->delete($id);

        if($comment){
           return $this->apiResponse(null,'successfuly deleted',200);
       }
    }
}
