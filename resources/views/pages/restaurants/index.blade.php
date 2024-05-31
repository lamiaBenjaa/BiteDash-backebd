@extends('layouts.main')
@section('title')
   Restaurants
@endsection
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
      <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Restaurant/</span>All Restaurants
    </h4>
    <div class="">
       <a href="{{route('restaurants.create')}}" class="btn btn-primary mb-4">Add Restaurant</a>
    </div>
    <div class="card">
        <div class="table-responsive text-nowrap">
           <table class="table">
             <thead>
                <tr>
                    <th class="text-center">ID</th>
                    <th class="text-center">Restaurant Name</th>
                    <th class="text-center">Description</th>
                    <th class="text-center">Address</th>
                    <th class="text-center">Phone</th>
                    <th class="text-center">Opening Hours</th>
                    <th class="text-center">Rating</th>
                    <th class="text-center">Image</th>
                    <th class="text-center">Actions</th>
                </tr>
             </thead>
             <tbody class="table-border-bottom-0">
                @foreach ($restaurants as $restaurant)
                    <tr>
                        <td class="text-center"><i class="fab fa-angular fa-lg text-danger me-3"></i>
                          <strong>{{$restaurant->id}}</strong>
                        </td>
                        <td class="text-center">{{$restaurant->name}}</td>
                        <td class="text-center">{{Str::limit($restaurant->description,15)}}</td>
                        <td class="text-center">{{Str::limit($restaurant->adress,10)}}</td>
                        <td class="text-center">{{$restaurant->phone}}</td>
                        <td class="text-center">{{$restaurant->openingHours}}</td>
                        <td class="text-center">{{$restaurant->rating}}</td>
                        
                        <td class="text-center">
                            <img  style="height: 100px ;width:100px;"
                            src="{{asset('storage/images/'.$restaurant->image)}}" alt="restaurant image">
                        </td>

                        <td class="text-center">
                            <div class="d-flex justify-content-center gap-3 align-items-center">
                                <a class="btn btn-primary p-1 rounded-circle" style="width: 1.8rem; height: 1.8rem;" href="{{ route('restaurants.show', $restaurant->id) }}">
                                    <i class='bx bx-show-alt'></i>
                                  </a>
                                <a class="btn btn-success p-1 rounded-circle" style="width: 1.8rem ; height:1.8rem" href="{{route('restaurants.edit',$restaurant->id)}}">
                                  <i class="bx bx-edit-alt"></i>
                                </a>
                                <form action="{{route('restaurants.destroy',$restaurant->id)}}" method="post" class="d-inline-block delete-patient-form">
                                   @csrf
                                   @method('DELETE')
                                   <button type="submit" class="btn btn-danger p-1 rounded-circle" style="width: 1.8rem ; height:1.8rem">
                                     <i class="bx bx-trash"></i>
                                   </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
             </tbody>
           </table>
          
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.querySelectorAll('.delete-patient-form').forEach(function (form) {
            form.addEventListener('submit',(e)=>{
                e.preventDefault();
                swal.fire({
                    title:'Are you sure ?',
                    text:"You won't be able to revert this!",
                    icon:'warning',
                    showCancelButton:true,
                    confirmButtonColor:'#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result)=>{
                    if(result.isConfirmed){
                        e.target.submit()
                    }
                });
            });
        });
    </script>
    </div>
    <div class="">

        {{ $restaurants->links() }}
        </div>
@endsection