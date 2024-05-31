@extends('layouts.main')
@section('title')
   Order Items
@endsection
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
      <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Order Item/</span>All Order Items
    </h4>
    <div class="">
       <a href="{{route('orderItems.create')}}" class="btn btn-primary mb-4">Add Order Item</a>
    </div>
    <div class="card">
        <div class="table-responsive text-nowrap">
           <table class="table">
             <thead>
                <tr>
                    <th class="text-center">ID</th>
                    <th class="text-center">Order</th>
                    <th class="text-center">Dish</th>
                    <th class="text-center">Price</th>
                    <th class="text-center">Quantity</th>
                    <th class="text-center">Actions</th>
                </tr>
             </thead>
             <tbody class="table-border-bottom-0">
                @foreach ($orderItems as $orderItem)
                    <tr>
                        <td class="text-center"><i class="fab fa-angular fa-lg text-danger me-3"></i>
                          <strong>{{$orderItem->id}}</strong>
                        </td>
                        
                        <td class="text-center">
                            @if ($orderItem->order)
                                {{$orderItem->order->orderDate}}
                            @else
                                N/A
                            @endif  
                        </td>

                        <td class="text-center">
                            @if ($orderItem->dish)
                                {{$orderItem->dish->name}}
                            @else
                                N/A
                            @endif  
                        </td>
                        <td class="text-center">{{$orderItem->price}} $</td>
                        <td class="text-center">{{$orderItem->quantity}}</td>
                        <td class="text-center">
                            <div class="d-flex justify-content-center gap-3 align-items-center">
                                <a class="btn btn-primary p-1 rounded-circle" style="width: 1.8rem; height: 1.8rem;" href="{{ route('orderItems.show', $orderItem->id) }}">
                                    <i class='bx bx-show-alt'></i>
                                  </a>
                                <a class="btn btn-success p-1 rounded-circle" style="width: 1.8rem ; height:1.8rem" href="{{route('orderItems.edit',$orderItem->id)}}">
                                  <i class="bx bx-edit-alt"></i>
                                </a>
                                <form action="{{route('orderItems.destroy',$orderItem->id)}}" method="post" class="d-inline-block delete-patient-form">
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

        {{ $orderItems->links() }}
        </div>
@endsection