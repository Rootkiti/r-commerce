@extends('layouts.layouts')
@section('title', 'Upload')
@section('content')
<div class="container">
 <form class="ms-auto me-auto" action="{{route('upload.post')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
    
        <label for="formFileLg" class="form-label">Large file input example</label>
        <input class="form-control form-control-lg" id="formFileLg" type="file" name="file">
    </div>
    <button type="submit" class="btn btn-primary" style="margin-left:80px;">Register</button>

</form>
    </div>
@endsection