@extends('layouts.main')
@section('title')
  Orders
@endsection
@section('content')
    <div class="" >
         <div class="mt-5">
           <div class="card text-center"style="width:80% , margin:auto">
            <div>
                <h3 class="pt-5"><i class='bx bxs-food-menu text-primary' style="font-size: 30px"></i> <span class="text-primary">Order Details</span></h3>
            </div>
             <div class="card-header ">ID : <span class="text-primary">{{$order->id}}</span></div>
             <div class="card-body">
               <h5 class="card-title">User Name : <span class="text-primary">{{$order->user->UserName}}</span></h5>
               <h5 class="card-title">Restaurant : <span class="text-primary">{{$order->restaurant->name}}</span></h5>
               <h5 class="card-text"> Order Date  : <span class="text-primary">{{$order->orderDate}}</span></h5>
               <h5 class="card-text"> Delivery Address  : <span class="text-primary">{{$order->deliveryAdress}}</span></h5>
               <h5 class="card-text"> total Amount  : <span class="text-primary">{{$order->totalAmount}}</span></h5>
               <h5 class="card-text"> Status  : <span class="text-primary">{{$order->status}}</span></h5>
             </div>
           </div>
        </div>
    </div>
@endsection