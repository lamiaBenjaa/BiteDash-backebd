<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
    <div class="row  m-auto mt-3 shadow p-3 mb-5 bg-body-tertiary rounded-5" style="width: 90%;height:100%">
        <div class="col rounded-start-5 ">
            <h1 class="my-3 text-center fw-bold" style="font-size: 70px">Sign Up</h1>
            <form action="{{route('Register')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-2">
                    <label class="form-label">User Name</label>
                    <input type="text" class="form-control" name="UserName" value="{{old('UserName')}}">
                    @error('UserName')
                        <div class="text-danger">
                           {{$message}}
                        </div>
                    @enderror
                  </div>
                <div class="mb-2">
                  <label for="exampleInputEmail1" class="form-label">Email address</label>
                  <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  name="email" value="{{old('UserName')}}">
                  <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                  @error('email')
                            <div class="text-danger">
                               {{$message}}
                            </div>
                @enderror
                </div>
                <div class="mb-2">
                    <label class="form-label">Address</label>
                    <input type="text" class="form-control" name="adress" value="{{old('adress')}}">
                    @error('adress')
                        <div class="text-danger">
                           {{$message}}
                        </div>
                    @enderror
                  </div>
                  <div class="mb-2">
                    <label class="form-label">Phone</label>
                    <input type="tel" class="form-control" name="phone" value="{{old('phone')}}">
                    @error('phone')
                        <div class="text-danger">
                           {{$message}}
                        </div>
                    @enderror
                  </div>
                <div class="mb-2">
                  <label for="exampleInputPassword1" class="form-label">Password</label>
                  <input type="password" class="form-control" id="exampleInputPassword1"  name="password">
                  @error('password')
                        <div class="text-danger">
                            {{$message}}
                        </div>
                @enderror
                </div>
                <div class="mb-2">
                    <label class="form-label">Password Confirmed</label>
                    <input type="password" class="form-control" name="password_confirmation">
                    @error('password_confirmation')
                        <div class="text-danger">
                           {{$message}}
                        </div>
                    @enderror
                  </div>
                  <div class="mb-2">
                    <label class="form-label">Image</label>
                    <input type="file" class="form-control" name="image">
                    @error('image')
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

                  <button type="submit" class="btn btn-warning form-control my-2">Sign Up</button>
                <p class="text-center">Already have an account ? <a href="{{route('showLogin')}}" class="text-warning d-inline text-center" style="text-decoration: none">Login In</a></p>

                  
              </form>
        </div>
        <div class="col h-100 w-100" >
            <img src="https://i.pinimg.com/736x/f3/eb/5c/f3eb5c241b05565d5eba2f936f0a7b9e.jpg" alt="" class="rounded-5" style="height:100%;width:100%;object-fit:cover">
        </div>
    </div>
</body>
</html>