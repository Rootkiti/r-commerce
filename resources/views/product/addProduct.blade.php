@extends('layouts.layouts')
@section('title', 'Add Product')
@section('content')
@include('includes.topNav')
@include('includes.leftbar')
<div class="category-container" style="margin-top: -46%;">
    

    <form action="{{route('addProduct.post')}}" method="POST" style="width: 500px;">
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
            <input type="text" name="product_name" class="form-control" value="{{old('product_name')}}">
            <span style="color:red;">@error('product_name'){{$message}}@enderror</span>
          </div>
          <div class="mb-1">
            <label  class="form-label">Product Category</label>
            @if($categories == '')
                <select class="form-select form-select-sm" aria-label="Small select example">
                    <option>No Product Categories Available</option>
                    
               </select>
            @else
            <select class="form-select form-select-sm" name="product_category" value="{{old('product_name')}} aria-label="Small select example">
                <option>Select Product Category</option>
                @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->category_name}}</option>
                @endforeach

              </select>
            <span style="color:red;">@error('product_category'){{$message}}@enderror</span>
            @endif
            
          </div>
          
          <div class="mb-1">
            <label  class="form-label">Product Cost</label>
            <input type="text" name="product_cost" class="form-control" value="{{old('product_cost')}}">
            <span style="color:red;">@error('product_cost'){{$message}}@enderror</span>
          </div>
          
          <div class="mb-1">
            <label class="form-label">Product Description</label>
            <textarea class="form-control" name="product_details" rows="3" >{{old('product_details')}}</textarea>
            <span style="color:red;">@error('product_details'){{$message}}@enderror</span>

          </div>
          <div class="mb-1">
            <label  class="form-label">Product Photo</label>
            <input class="form-control" type="file" name="image" id="">
            <span style="color:red;">@error('image'){{$message}}@enderror</span>
          </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
</div>

@endsection