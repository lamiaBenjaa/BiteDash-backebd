@extends('layouts.main')
@section('title')
   Reviews
@endsection
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
      <h4 class="fw-bold py-3 mb-4">
         <span class="text-muted fw-light">Review/</span>Update Reviews
      </h4>
      <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header d-flex justify-centent-between align-items-center"></div>
                <div class="card-body">
                    <form action="{{route('reviews.update',$review->id)}}" method="post">
                      @csrf
                      @method('PUT')
                      <div class="mb-3">
                        <label class="form-label">User ID</label>
                        <input type="text" class="form-control" name="user_id" value="{{old('user_id',$review->user_id)}}">
                        @error('user_id')
                            <div class="text-danger">
                               {{$message}}
                            </div>
                        @enderror
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Restaurant ID</label>
                        <input type="text" class="form-control" name="restaurant_id" value="{{old('restaurant_id',$review->restaurant_id)}}">
                        @error('email')
                            <div class="text-danger">
                               {{$message}}
                            </div>
                        @enderror
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Comment</label>
                        <input type="text" class="form-control" name="comment" value="{{old('comment',$review->comment)}}">
                        @error('comment')
                            <div class="text-danger">
                               {{$message}}
                            </div>
                        @enderror
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Rating</label>
                        <input type="text" class="form-control" name="rating" value="{{old('rating',$review->rating)}}">
                        @error('rating')
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