    @extends('layouts.layouts')
    @section('title', 'Home')
    @section('content')
   
    <div>
        <!-- navbar section -->
       @include('includes.topNav')
       @include('includes.leftbar')
            <!-- navbar end -->
        <div class="row justify-content-center" style="margin-top: -35%; margin-left:200px;">
            <div class="row">
                <div class="col-sm-2 mb-3 mb-sm-0" style="width:200px;">
                  <div class="card">
                    <div class="card-body" style="width:200px; height:200px;">
                      <div>
                        Total Categories
                      </div>
                      <div style="padding: 60px;">
                        {{$n_category}}
                      </div>
                      
                    </div>
                  </div>
                </div>

                <div class="col-sm-2" style="width:200px;">
                  <div class="card">
                    <div class="card-body" style="width:200px; height:200px;">
                      <div>
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
