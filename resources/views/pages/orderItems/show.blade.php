@extends('layouts.main')
@section('title')
   Order Items
@endsection
@section('content')
    <div class="" >
         <div class="mt-5">
           <div class="card text-center"style="width:80% , margin:auto">
            <div>
                <h3 class="pt-5"><i class='bx bx-id-card text-primary' style="font-size: 30px"></i> <span class="text-primary">Order Item</span></h3>
            </div>
             <div class="card-header ">ID : <span class="text-primary">{{$orderItem->id}}</span></div>
             <div class="card-body">
               <h5 class="card-title"> Order : <span class="text-primary">{{$orderItem->order->orderDate}}</span></h5>
               <h5 class="card-title"> Dish : <span class="text-primary">{{$orderItem->dish->name}}</span></h5>
               <h5 class="card-text"> Price : <span class="text-primary">{{$orderItem->price}}</span></h5>
               <h5 class="card-text"> Quantity : <span class="text-primary">{{$orderItem->quantity}}</span></h5>
             </div>
           </div>
        </div>
    </div>
@endsection