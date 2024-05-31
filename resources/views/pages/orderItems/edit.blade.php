@extends('layouts.main')
@section('title')
   Order Items
@endsection
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
      <h4 class="fw-bold py-3 mb-4">
         <span class="text-muted fw-light">order Item/</span>Update order Items
      </h4>
      <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header d-flex justify-centent-between align-items-center"></div>
                <div class="card-body">
                    <form action="{{route('orderItems.update',$orderItem->id)}}" method="post">
                      @csrf
                      @method('PUT')
                      <div class="mb-3">
                        <label class="form-label">Order ID</label>
                        <input type="text" class="form-control" name="order_id" value="{{old('order_id',$orderItem->order_id)}}">
                        @error('order_id')
                            <div class="text-danger">
                               {{$message}}
                            </div>
                        @enderror
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Dish ID</label>
                        <input type="text" class="form-control" name="dish_id" value="{{old('dish_id',$orderItem->dish_id)}}">
                        @error('dish_id')
                            <div class="text-danger">
                               {{$message}}
                            </div>
                        @enderror
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Price</label>
                        <input type="text" class="form-control" name="price" value="{{old('price',$orderItem->price)}}">
                        @error('price')
                            <div class="text-danger">
                               {{$message}}
                            </div>
                        @enderror
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Quantity</label>
                        <input type="text" class="form-control" name="quantity" value="{{old('quantity',$orderItem->quantity)}}">
                        @error('quantity')
                            <div class="text-danger">
                               {{$message}}
                            </div>
                        @enderror
                      </div>
                      <button type="submit" class="btn btn-primary mt-4">Submit</button>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </div>
@endsection