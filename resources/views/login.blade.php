@extends('layouts.layouts')
@section('title', 'Login')
@section('content')
<div class="login-container">
<form class="ms-auto me-auto">
<div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" name="email"class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
  </div>
  <button type="submit" class="btn btn-primary">Login</button>
  <button type="submit" class="btn btn-primary" style="margin-left:100px;">Register</button><br><br>
  <a href="" class="nav-link" style="margin-left:80px;">back to site</a>
</form>
</div>
@endsection