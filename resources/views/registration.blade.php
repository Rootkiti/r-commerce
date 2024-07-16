@extends('layouts.layouts')
@section('title', 'Registration')
@section('content')
<div class="login-container">
    <div class="mt-5">
        {{-- @if($errors->any())
            <div class="col-3 error">
                @foreach($errors->all() as $error)  
                    <div class="alert alert-danger alert-dismissible fade show">{{$error}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endforeach              
            </div>
        @endif --}}

        @if(session()->has('error'))
            <div class="alert alert-danger alert-dismissible fade show">{{session('error')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

        @endif

        @if(session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show">{{session('success')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

        @endif
    </div>
<form class="ms-auto me-auto" action="{{route('registration.post')}}" method="post">
@csrf
<div class="mb-3">
    <label for="#exampleInputEmail1" class="form-label">Name </label>
    <input type="text" class="form-control" id="#exampleInputEmail1" name="name" aria-describedby="emailHelp">
    <span style="color:red;">@error('name'){{$message}}@enderror</span>

  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <span style="color:red;">@error('email'){{$message}}@enderror</span>


  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
    <span style="color:red;">@error('password'){{$message}}@enderror</span>

  </div>
 
  <button type="submit" class="btn btn-primary" style="margin-left:80px;">Register</button>
  <!-- <button type="submit" class="btn btn-primary" style="margin-left:100px;">Register</button><br><br> -->
  <a href="{{route('login')}}" class="nav-link" style="margin-left:10px;">Already have an account, Login</a>
</form>
</div>
@endsection