@extends('layouts.main')
@section('title')
   Reviews
@endsection
@section('content')
    <div class="" >
         <div class="mt-5">
           <div class="card text-center"style="width:80% , margin:auto">
            <div>
                <h3 class="pt-5"><i class='bx bxs-message-square-dots text-primary' style="font-size: 30px"></i> <span class="text-primary">Review</span></h3>
            </div>
             <div class="card-header ">ID : <span class="text-primary">{{$review->id}}</span></div>
             <div class="card-body">
               <h5 class="card-title">User Name : <span class="text-primary">{{$review->user->UserName}}</span></h5>
               <h5 class="card-title">Restaurant Name : <span class="text-primary">{{$review->restaurant->name}}</span></h5>
               <h5 class="card-text"> Comment : <span class="text-primary">{{$review->comment}}</span></h5>
               <h5 class="card-text"> Rating : <span class="text-primary">{{$review->rating}}</span></h5>
             </div>
           </div>
        </div>
    </div>
@endsection