@extends('layouts.main')
@section('title')
   Dishes
@endsection
@section('content')
    <div class="" >
         <div class="mt-5">
           <div class="card text-center"style="width:80% , margin:auto">
            <div>
                <h3 class="pt-5"><i class='bx bxs-dish text-primary' style="font-size: 30px"></i> <span class="text-primary">Dish Details</span></h3>
            </div>
             <div class="card-header ">ID : <span class="text-primary">{{$dish->id}}</span></div>
             <div class="card-body">
              <h5 class="card-text">Description : <span class="text-primary">{{$dish->restaurant->name}}</span></h5>
              <h5 class="card-text">Description : <span class="text-primary">{{$dish->categorie->name}}</span></h5>
               <h5 class="card-title">Dish Name : <span class="text-primary">{{$dish->name}}</span></h5>
               <h5 class="card-text">Description : <span class="text-primary">{{$dish->description}}</span></h5>
               <h5 class="card-text">Price : <span class="text-primary">{{$dish->price}}</span></h5>
               <h5 class="card-text"><span class="text-primary">
                    <img style="width: 200px; height:200px;"
                     src="{{asset('storage/images/'.$dish->image)}}" alt="image">  
              </span></h5>
             </div>
           </div>
        </div>
    </div>
@endsection