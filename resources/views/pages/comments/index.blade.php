@extends('layouts.main')
@section('title')
   Comments
@endsection
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
      <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Comment/</span>All Comments
    </h4>
    <div class="">
       <a href="{{route('comments.create')}}" class="btn btn-primary mb-4">Add Comment</a>
    </div>
    <div class="card">
        <div class="table-responsive text-nowrap">
           <table class="table">
             <thead>
                <tr>
                    <th class="text-center">ID</th>
                    <th class="text-center">User</th>
                    <th class="text-center">Post</th>
                    <th class="text-center">Comment</th>
                    <th class="text-center">Actions</th>
                </tr>
             </thead>
             <tbody class="table-border-bottom-0">
                @foreach ($comments as $comment)
                    <tr>
                        <td class="text-center"><i class="fab fa-angular fa-lg text-danger me-3"></i>
                          <strong>{{$comment->id}}</strong>
                        </td>

                        <td class="text-center">
                            @if ($comment->user)
                                {{$comment->user->UserName}}
                            @else
                                N/A
                            @endif  
                        </td>

                        <td class="text-center">
                            @if ($comment->blogPost)
                                {{$comment->blogPost->title}}
                            @else
                                N/A
                            @endif  
                        </td>
                        <td class="text-center">{{Str::limit($comment->content,15)}}</td>
                        <td class="text-center">
                            <div class="d-flex justify-content-center gap-3 align-items-center">
                                <a class="btn btn-primary p-1 rounded-circle" style="width: 1.8rem; height: 1.8rem;" href="{{ route('comments.show', $comment->id) }}">
                                    <i class='bx bx-show-alt'></i>
                                  </a>
                                <a class="btn btn-success p-1 rounded-circle" style="width: 1.8rem ; height:1.8rem" href="{{route('comments.edit',$comment->id)}}">
                                  <i class="bx bx-edit-alt"></i>
                                </a>
                                <form action="{{route('comments.destroy',$comment->id)}}" method="post" class="d-inline-block delete-patient-form">
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

        {{ $comments->links() }}
        </div>
@endsection