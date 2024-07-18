@extends('layouts.layouts')
@section('title', 'Edit Product')
@section('content')
@include('includes.topNav')
@include('includes.leftbar')
<div style="margin-top: -45.5%;">

    @if($product == '')
        <h3 style="margin-left:600px; margin-top: 20%;">No product Found</h3>
    @else 
    <form action="/updateproduct/{{$product->id}}" method="POST" style="width: 500px;" enctype="multipart/form-data">
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
            <div class="mb-1">
                <label  class="form-label">Product name</label>
                <input type="hidden">
                <input type="text" name="product_name" class="form-control" value="{{$product->product_name}}">
                <span style="color:red;">@error('product_name'){{$message}}@enderror</span>
              </div>
              <div class="mb-1">
                <label  class="form-label">Product Category</label>
                
                <select class="form-select form-select-sm" name="product_category" value="{{$product->category}}" aria-label="Small select example">
                    <option value="{{$category->id}}">{{$category->category_name}}</option>
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->category_name}}</option>
                    @endforeach
    
                  </select>
                <span style="color:red;">@error('product_category'){{$message}}@enderror</span>
                
              </div>
              
              <div class="mb-1">
                <label  class="form-label">Price</label>
                <input type="text" name="price" class="form-control" value="{{$product->price}}">
                <span style="color:red;">@error('price'){{$message}}@enderror</span>
              </div>
              
              <div class="mb-1">
                <label class="form-label">Product Description</label>
                <textarea class="form-control" name="description" rows="3" >{{$product->description}}</textarea>
                <span style="color:red;">@error('description'){{$message}}@enderror</span>
    
              </div>
              <div class="mb-1">
                <label  class="form-label">Product Photo</label>
                <input class="form-control" type="file" name="image" id="">
              </div>
            <button type="submit" class="btn btn-primary">Update Product</button>
      </form>

    @endif
    

    
</div>
@endsection