@extends('layouts.main')
@section('title')
   Users
@endsection
@section('content')
    <div class="" >
         <div class="mt-5">
           <div class="card text-center"style="width:80% , margin:auto">
            <div>
                <h3 class="pt-5"><i class='bx bx-id-card text-primary' style="font-size: 30px"></i> <span class="text-primary">Personel Information</span></h3>
            </div>
             <div class="card-header ">ID : <span class="text-primary">{{$user->id}}</span></div>
             <div class="card-body">
               <h5 class="card-title">Complete Name : <span class="text-primary">{{$user->UserName}}</span></h5>
               <h5 class="card-text"><i class='bx bxl-gmail'></i> Email : <span class="text-primary">{{$user->email}}</span></h5>
               <h5 class="card-title"> Phone : <span class="text-primary">{{$user->phone}}</span></h5>
               <h5 class="card-title"> Address : <span class="text-primary">{{$user->adress}}</span></h5>
               <h5 class="card-text"><span class="text-primary">
                <img style="width: 200px; height:200px;"
                 src="{{asset('storage/images/'.$user->image)}}" alt="image">  
               </span></h5>
             </div>
           </div>
        </div>
    </div>
@endsection