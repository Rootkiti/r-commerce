@extends('adminlte::page')
@extends('layouts/adminLayout')
@section('title', 'Add Category')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
   
    <div>
        <!-- navbar section -->
       {{-- @include('includes.topNav')
       @include('includes.leftbar') --}}
            <!-- navbar end -->
        <div class="row justify-content-center" style="#">
            <div class="row">
                <div class="col-sm-2 mb-3 mb-sm-0" style="width:200px;">
                  <div class="card" style="background-color:rgb(231, 157, 157);">
                    <div class="card-body" style="width:200px; height:200px;">
                      <div style="font-size: 18px;">
                        Total Categories
                      </div>
                      <div style="padding: 60px;">
                        {{$n_category}}
                      </div>
                      
                    </div>
                  </div>
                </div>

                <div class="col-sm-2" style="width:200px;">
                  <div class="card" style="background-color: rgb(110, 149, 149)">
                    <div class="card-body" style="width:200px; height:200px;">
                      <div style="font-size: 18px;">
                        Total Products
                      </div>
                      <div style="padding: 60px;">
                        {{$n_product}}
                      </div>
                    </div>
                  </div>
                </div>

              </div>
        </div>
    </div>
    {{-- {{auth()->user()->name}} --}}
    @endsection
