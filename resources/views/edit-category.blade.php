@extends('adminlte::page')
@extends('layouts/adminLayout')
@section('title', 'Edit Category')

@section('content_header')
    <h1>Edit Product Category</h1>
@stop

@section('content')
<div class="category-container" style="#">

    @if($category == '')
        <h3 style="margin-left:600px; margin-top: 20%;">No category Found</h3>
    @else 
    <form action="/updatecategory/{{$category->id}}" method="POST" style="width: 500px;">
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
                <input type="hidden"  name="id" value="{{$category->id}}">
                <input type="text" name="cat_name" class="form-control" value="{{$category->category_name}}">
                <span style="color:red;">@error('cat_name'){{$message}}@enderror</span>
            </div>
            <div class="mb-3">
                <label class="form-label">category description</label>
                <textarea class="form-control" name="cat_details" rows="3" value="{{$category->category_details}}">{{$category->category_details}}</textarea>
                <span style="color:red;">@error('cat_details'){{$message}}@enderror</span>

            </div>
            <button type="submit" class="btn btn-primary">Update Category</button>
      </form>

    @endif
    

    
</div>
@endsection