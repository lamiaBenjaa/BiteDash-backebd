@extends('layouts.main')
@section('title')
   Comments
@endsection
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
      <h4 class="fw-bold py-3 mb-4">
         <span class="text-muted fw-light">Comment/</span>Update Comments
      </h4>
      <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header d-flex justify-centent-between align-items-center"></div>
                <div class="card-body">
                    <form action="{{route('comments.update',$comment->id)}}" method="post">
                      @csrf
                      @method('PUT')
                      <div class="mb-3">
                        <label class="form-label">User ID</label>
                        <input type="text" class="form-control" name="user_id" value="{{old('user_id',$comment->user_id)}}">
                        @error('user_id')
                            <div class="text-danger">
                               {{$message}}
                            </div>
                        @enderror
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Post ID</label>
                        <input type="text" class="form-control" name="post_id" value="{{old('post_id',$comment->post_id)}}">
                        @error('post_id')
                            <div class="text-danger">
                               {{$message}}
                            </div>
                        @enderror
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Comment</label>
                        <input type="text" class="form-control" name="content" value="{{old('content',$comment->content)}}">
                        @error('content')
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