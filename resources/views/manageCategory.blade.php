@extends('adminlte::page')
@extends('layouts/adminLayout')
@section('title', 'Manage Categories')

@section('content_header')
    <h1>Manage Category</h1>
@stop

@section('content')

<div class="manage_categories" style="padding:0px 30px 0px 10px;">
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
            <th scope="col">Category Name</th>
            <th scope="col">Details</th>
            <th scope="col">Action</th>
        </thead>
        @php
             $n = 1;    
        @endphp
        
        @foreach($categories as $category)
          
            <tr>
                <td>{{$n}}</td>
                <td>{{$category->category_name}}</td>
                <td>{{$category->category_details}}</td>
                <td>
                    <a href="/edit-category/{{$category->id}}" class="btn btn-primary btn-small">
                        <i class="fas fa-pencil" aria-hidden="true"></i>
                    </a>
                    <a href="/deletecategory/{{$category->id}}" class="btn btn-primary btn-small">
                        <i class="fa fa-trash"></i>
                    </a>
                    
                </td>
            </tr>
            @php
             $n ++;    
           @endphp
        @endforeach
    </table>

</div>
@endsection