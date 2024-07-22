@extends('adminlte::page')
@extends('layouts/adminLayout')
@section('title', 'Add Category')

@section('content_header')
    <h1>Manage Products</h1>
@stop

@section('content')
<div style="#">
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
        <div class="card-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead class="bg-primary text-white">
                    <th scope="col">#</th>
                    <th scope="col">Product name</th>
                    <th scope="col">Category</th>
                    <th scope="col">Price</th>
                    <th scope="col">Photo</th>
                    <th scope="col">Description</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Action</th>
                </thead>
                @php
                    $n = 1;    
                @endphp
                        <tbody>

                @foreach($products as $product)
                
                    <tr>
                        <td>{{$n}}</td>
                        <td>{{$product->product_name}}</td>
                        @foreach($categories as $category)
                            @if($category->id == $product->category)
                                <td>{{$category->category_name}}</td>
                            
                            @endif
                        @endforeach                
                        <td>{{$product->price}} Rwf</td>
                        <td><img src="{{$product->imageUrl}}" alt="" width="50" height="25"></td>
                        <td>{{$product->description}}</td>
                        <td>{{$product->quantity}}</td>

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
            </tbody>
            
            </table>
        </div>
    {{-- {{$products}} --}}
</div>
<script>
    $(function () {
      $("#example2").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>
@endsection