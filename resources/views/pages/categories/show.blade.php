@extends('layouts.main')
@section('title')
   Categories
@endsection
@section('content')
    <div class="" >
         <div class="mt-5">
           <div class="card text-center"style="width:80% , margin:auto">
            <div>
                <h3 class="pt-5"><i class='bx bxs-category text-primary' style="font-size: 30px"></i> <span class="text-primary">Categorie Details</span></h3>
            </div>
             <div class="card-header ">ID : <span class="text-primary">{{$categorie->id}}</span></div>
             <div class="card-body">
               <h5 class="card-title">Categorie Name : <span class="text-primary">{{$categorie->name}}</span></h5>
               <h5 class="card-text">
                <img style="width: 200px ;height:200px;"
                src="{{asset('storage/images/'.$categorie->image)}}" alt="image">
               </h5>
             </div>
           </div>
        </div>
    </div>
@endsection