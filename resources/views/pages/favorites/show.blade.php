@extends('layouts.main')
@section('title')
   Favorites
@endsection
@section('content')
    <div class="" >
         <div class="mt-5">
           <div class="card text-center"style="width:80% , margin:auto">
            <div>
                <h3 class="pt-5"><i class='bx bxs-heart text-primary' style="font-size: 30px"></i> <span class="text-primary">Favorite</span></h3>
            </div>
             <div class="card-header ">ID : <span class="text-primary">{{$favorite->id}}</span></div>
             <div class="card-body">
               <h5 class="card-title">User Name : <span class="text-primary">{{$favorite->user->UserName}}</span></h5>
               <h5 class="card-text"> Restaurant  : <span class="text-primary">{{$favorite->Restaurant->name}}</span></h5>
             </div>
           </div>
        </div>
    </div>
@endsection