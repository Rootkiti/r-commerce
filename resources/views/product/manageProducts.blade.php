@extends('layouts.layouts')
@section('title', 'Manage Products')
@section('content')
@include('includes.topNav')
@include('includes.leftbar')
<div style="margin-left: 200px; margin-top: -37%; padding:0px 30px 0px 10px;">
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
    <table class="table table-striped table-bordered" >
        <thead class="bg-primary text-white">
            <th scope="col">#</th>
            <th scope="col">Product name</th>
            <th scope="col">Category</th>
            <th scope="col">Price</th>
            <th scope="col">Photo</th>
            <th scope="col">Description</th>
            <th scope="col">Action</th>
        </thead>
        @php
             $n = 1;    
        @endphp
        
        @foreach($products as $product)
          
            <tr>
                <td>{{$n}}</td>
                <td>{{$product->product_name}}</td>
                @foreach($categories as $category)
                    @if($category->id == $product->category)
                        <td>{{$category->category_name}}</td>
                    
                    @endif
                @endforeach                
                <td>{{$product->price}}</td>
                <td><img src="{{$product->imageUrl}}" alt="" width="50" height="25"></td>
                <td>{{$product->description}}</td>
                <td>
                    <a href="/editProduct/{{$product->id}}" class="btn btn-primary btn-small">
                        <i class="fa fa-pencil" aria-hidden="true"></i>
                    </a>
                    <a href="/deleteProduct/{{$product->id}}" class="btn btn-primary btn-small">
                        <i class="fa fa-trash"></i>
                    </a>
                    
                </td>
            </tr>
            @php
             $n ++;    
           @endphp
        @endforeach
    </table>
    {{-- {{$products}} --}}
</div>
@endsection