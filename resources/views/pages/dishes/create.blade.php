@extends('layouts.main')
@section('title')
   Dishes
@endsection
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
      <h4 class="fw-bold py-3 mb-4">
         <span class="text-muted fw-light">Dish/</span>Create Dishes
      </h4>
      <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header d-flex justify-centent-between align-items-center"></div>
                <div class="card-body">
                    <form action="{{route('dishes.store')}}" method="post" enctype="multipart/form-data">
                      @csrf
                      <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" value="{{old('name')}}">
                        @error('UserName')
                            <div class="text-danger">
                               {{$message}}
                            </div>
                        @enderror
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Restarant ID</label>
                        <input type="number" class="form-control" name="restaurant_id" value="{{old('restaurant_id')}}">
                        @error('restaurant_id')
                            <div class="text-danger">
                               {{$message}}
                            </div>
                        @enderror
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Categorie ID</label>
                        <input type="number" class="form-control" name="categorie_id" value="{{old('categorie_id')}}">
                        @error('categorie_id')
                            <div class="text-danger">
                               {{$message}}
                            </div>
                        @enderror
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Description</label>
                        <input type="tel" class="form-control" name="description" value="{{old('description')}}">
                        @error('description')
                            <div class="text-danger">
                               {{$message}}
                            </div>
                        @enderror
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Price</label>
                        <input type="text" class="form-control" name="price" value="{{old('price')}}">
                        @error('price')
                            <div class="text-danger">
                               {{$message}}
                            </div>
                        @enderror
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Rating</label>
                        <input type="text" class="form-control" id="rating" name="rating" value="{{old('rating')}}" required min="1" max="5" step="1">
                        @error('rating')
                            <div class="text-danger">
                               {{$message}}
                            </div>
                        @enderror
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Image</label>
                        <input type="file" class="form-control" name="image" value="{{old('image')}}">
                        @error('image')
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