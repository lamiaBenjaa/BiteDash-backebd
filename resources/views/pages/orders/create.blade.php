@extends('layouts.main')
@section('title')
    Orders
@endsection
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
      <h4 class="fw-bold py-3 mb-4">
         <span class="text-muted fw-light">Order/</span>Create Orders
      </h4>
      <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header d-flex justify-centent-between align-items-center"></div>
                <div class="card-body">
                    <form action="{{route('orders.store')}}" method="post">
                      @csrf
                      <div class="mb-3">
                        <label class="form-label">Client ID</label>
                        <input type="text" class="form-control" name="user_id" value="{{old('user_id')}}">
                        @error('user_id')
                            <div class="text-danger">
                               {{$message}}
                            </div>
                        @enderror
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Restaurant ID</label>
                        <input type="text" class="form-control" name="restaurant_id" value="{{old('restaurant_id')}}">
                        @error('restaurant_id')
                            <div class="text-danger">
                               {{$message}}
                            </div>
                        @enderror
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Order Date</label>
                        <input type="date" class="form-control" name="orderDate" value="{{old('orderDate')}}">
                        @error('orderDate')
                            <div class="text-danger">
                               {{$message}}
                            </div>
                        @enderror
                      </div>
                      <div class="mb-3">
                        <label class="form-label">delivery Address</label>
                        <input type="text" class="form-control" name="deliveryAdress" value="{{old('deliveryAdress')}}">
                        @error('deliveryAdress')
                            <div class="text-danger">
                               {{$message}}
                            </div>
                        @enderror
                      </div>
                      <div class="mb-3">
                        <label class="form-label">total Amount</label>
                        <input type="tetx" class="form-control" name="totalAmount" value="{{old('totalAmount')}}">
                        @error('totalAmount')
                            <div class="text-danger">
                               {{$message}}
                            </div>
                        @enderror
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select name="status" value="{{old('status')}}" class="form-control">
                            <option value="pending">Pending</option>
                            <option value="confirmed">Confirmed</option>
                            <option value="delivered">Delivered</option>
                        </select>
                        @error('password_confirmation')
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