@extends('layouts.main')
@section('title')
   Restaurants
@endsection
@section('content')
    <div class="" >
         <div class="mt-5">
           <div class="card text-center"style="width:80% , margin:auto">
            <div>
                <h3 class="pt-5"><i class='bx bxs-store-alt text-primary' style="font-size: 30px"></i> <span class="text-primary">Restaurant Details</span></h3>
            </div>
             <div class="card-header ">ID : <span class="text-primary">{{$restaurant->id}}</span></div>
             <div class="card-body">
               <h5 class="card-title">Restaurant Name : <span class="text-primary">{{$restaurant->name}}</span></h5>
               <h5 class="card-title">Description : <span class="text-primary">{{$restaurant->description}}</span></h5>
               <h5 class="card-title">Address : <span class="text-primary">{{$restaurant->adress}}</span></h5>
               <h5 class="card-title">Phone : <span class="text-primary">{{$restaurant->phone}}</span></h5>
               <h5 class="card-title">Opening Hours : <span class="text-primary">{{$restaurant->openingHours}}</span></h5>
               <h5 class="card-title">Rating : <span class="text-primary">{{$restaurant->rating}}</span></h5>
               <h5 class="card-title"><span class="text-primary">
                  <img  style="width:200px;height:200px"
                  src="{{asset('storage/images/'.$restaurant->image)}}" alt="restaurant">
              </span></h5>
             </div>
           </div>
        </div>
    </div>
@endsection