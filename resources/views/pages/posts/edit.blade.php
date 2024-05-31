@extends('layouts.main')
@section('title')
  Posts
@endsection
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
      <h4 class="fw-bold py-3 mb-4">
         <span class="text-muted fw-light">BlogPost/</span>Update BlogPosts
      </h4>
      <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header d-flex justify-centent-between align-items-center"></div>
                <div class="card-body">
                    <form action="{{route('posts.update',$blogPost->id)}}" method="post">
                      @csrf
                      @method('PUT')
                      <div class="mb-3">
                        <label class="form-label">User ID</label>
                        <input type="text" class="form-control" name="user_id" value="{{old('user_id',$blogPost->user_id)}}">
                        @error('user_id')
                            <div class="text-danger">
                               {{$message}}
                            </div>
                        @enderror
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Title</label>
                        <input type="text" class="form-control" name="title" value="{{old('title',$blogPost->title)}}">
                        @error('title')
                            <div class="text-danger">
                               {{$message}}
                            </div>
                        @enderror
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Content</label>
                        <input type="text" class="form-control" name="content" value="{{old('content',$blogPost->content)}}">
                        @error('content')
                            <div class="text-danger">
                               {{$message}}
                            </div>
                        @enderror
                      <button type="submit" class="btn btn-primary mt-4">Submit</button>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </div>
@endsection