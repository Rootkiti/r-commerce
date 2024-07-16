@extends('layouts.layouts')
@section('title', 'Login')
@section('content')
<div class="login-container">
<div class="mt-5">
        {{-- @if($errors->any())
            <div class="col-3 error">
                @foreach($errors->all() as $error)  
                    <div class="alert alert-danger lert-dismissible fade show">{{$error}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

                    </div>
                @endforeach              
            </div>
        @endif --}}

        @if(session()->has('error'))
            <div class="alert alert-danger lert-dismissible fade show">{{session('error')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

        @endif

        @if(session()->has('success'))
            <div class="alert alert-success lert-dismissible fade show">{{session('success')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

        @endif
    </div>
<form action="{{route('login.post')}}" method="post" class="ms-auto me-auto">
    @csrf
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
  <button type="submit" class="btn btn-primary">Login</button>
  <a href="{{route('registration')}}" style="margin-left:100px;"><button type="button" class="btn btn-primary" >Register</button></a><br><br>
  <a href="{{route('index')}}" class="nav-link" style="margin-left:80px;">back to site</a>
</form>
</div>
@endsection