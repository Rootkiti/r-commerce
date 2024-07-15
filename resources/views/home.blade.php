    @extends('layouts.layouts')
    @section('title', 'Home')
    @section('content')
    <div class="container">
        <!-- navbar section -->
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
                <div class="container-fluid">
                
                    <div class="collapse navbar-collapse" id="navbarText">
                    
                    <span class="navbar-text" style="margin-left:auto;">
                        <a href="{{route('logout')}}" class="nav-link" rel="noopener noreferrer">Logout</a>
                    </span>
                    </div>
            </div>
        </nav>
            <!-- navbar end -->
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{auth()->user()->name}}
    @endsection
