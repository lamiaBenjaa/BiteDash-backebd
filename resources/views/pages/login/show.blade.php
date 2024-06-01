<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <title>BiteDash | Dashboard | Login</title>
</head>
<body>
  <div class="m-3">
    @if(session()->has('warning'))
     <x-alert type='warning'>
        {{session('warning')}}
     </x-alert>
  @endif
  </div>
    <div class="row  m-auto mt-4 shadow p-3 mb-5 bg-body-tertiary rounded-5" style="width: 90%;height:90vh">
        <div class="col rounded-start-5 " style="height: 100vh">
            <h1 class="my-5 text-center fw-bold" style="font-size: 70px">Login</h1>
            <form action="{{route('login.login')}}" method="POST" s>
                @csrf
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Email address</label>
                  <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  name="email">
                  <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                  @error('email')
                            <div class="text-danger">
                               {{$message}}
                            </div>
                @enderror
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">Password</label>
                  <input type="password" class="form-control" id="exampleInputPassword1"  name="password">
                  @error('password')
                        <div class="text-danger">
                            {{$message}}
                        </div>
                @enderror
                </div>
                <div class="mb-3 form-check d-flex justify-content-between">
                  <div>
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Remember me</label>
                  </div>
                  <div>
                    <a href="">Forget Password </a>
                  </div>
                </div>
                <div>
                <button type="submit" class="btn btn-warning form-control my-2">Login</button>
                
                <p class="text-center">Don't have an account ? <a href="{{route('showRegister')}}" class="text-warning d-inline text-center" style="text-decoration: none">Sign Up</a></p>
                <div class="d-flex">
                  <p class="border  m-auto" style="width: 40%"></p>
                  <p>Or</p>
                  <p class="border  m-auto" style="width: 40%"></p>
                </div>
                </div>
                <div class="d-flex justify-content-center my-3">
                <img src="{{asset('ui/assets/img/icons/brands/google.png')}}" alt="User" class="rounded mx-2" width="25px" />
                <img src="{{asset('ui/assets/img/icons/brands/facebook.png')}}" alt="User" class="rounded mx-2" width="25px"  />
                <img src="{{asset('ui/assets/img/icons/brands/instagram.png')}}" alt="User" class="rounded mx-2" width="25px" />
                <img src="{{asset('ui/assets/img/icons/brands/twitter.png')}}" alt="User" class="rounded mx-2" width="25px" />

                </div>
              </form>
              
        </div>
        <div class="col h-100 w-100">
            <img src="https://i.pinimg.com/736x/f3/eb/5c/f3eb5c241b05565d5eba2f936f0a7b9e.jpg" alt="" class="rounded-5" style="height:100%;width:100%;object-fit:cover">
        </div>
    </div>

    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
</body>
</html>