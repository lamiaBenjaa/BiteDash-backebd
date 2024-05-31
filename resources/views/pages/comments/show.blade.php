@extends('layouts.main')
@section('title')
   Comments
@endsection
@section('content')
    <div class="" >
         <div class="mt-5">
           <div class="card text-center"style="width:80% , margin:auto">
            <div>
                <h3 class="pt-5"><i class='bx bxs-chat text-primary' style="font-size: 30px"></i> <span class="text-primary">Comment details</span></h3>
            </div>
             <div class="card-header ">ID : <span class="text-primary">{{$comment->id}}</span></div>
             <div class="card-body">
               <h5 class="card-title">User Name : <span class="text-primary">{{$comment->user->UserName}}</span></h5>
               <h5 class="card-title">Post : <span class="text-primary">{{$comment->blogPost->title}}</span></h5>
             </div>
           </div>
        </div>
    </div>
@endsection