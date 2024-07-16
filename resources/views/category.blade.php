@extends('layouts.layouts')
@section('title', 'Addd category')
@section('content')
@include('includes.topNav')
@include('includes.leftbar')
<div class="category-container" style="margin-top: -40%;">
    

    <form action="{{route('category.post')}}" method="POST" style="width: 500px;">
        @csrf

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
        <div class="mb-3">
            <label  class="form-label">Category name</label>
            <input type="text" name="cat_name" class="form-control" value="{{old('cat_name')}}">
            <span style="color:red;">@error('cat_name'){{$message}}@enderror</span>
          </div>
          <div class="mb-3">
            <label class="form-label">category description</label>
            <textarea class="form-control" name="cat_details" rows="3" value="{{old('cat_details')}}"></textarea>
            <span style="color:red;">@error('cat_details'){{$message}}@enderror</span>

          </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
</div>

@endsection