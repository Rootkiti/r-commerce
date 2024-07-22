@extends('layouts.layouts')
@section('title', 'Index')
@section('content')
    <div class="container">
        <!-- navbar section -->
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
               
                <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Smartphone</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="#">Tablets</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="#">Laptops</a>
                    </li>
                </ul>
                <span class="navbar-text">
                    <ul class="navbar-nav">
                        <li>
                            @livewire('cart-counter')

                            
                        </li>
                        <li>
                            @if (auth()->user())
                                <a href="{{route('logout')}}" class="nav-link" rel="noopener noreferrer">Logout</a>
                            @else
                                <a href="{{route('login')}}" class="nav-link" rel="noopener noreferrer">Login</a>

                            @endif

                        </li>
                    </ul>
                </span>
                </div>
        </div>
    </nav>
         <!-- navbar end -->
        <header>
            <h1>Electronic Devices Store</h1>
            <input type="text" id="search" placeholder="Search for products...">
            <select id="category">
                <option value="all">All</option>
                @foreach($categories as $category)
                <option value="smartphones">{{$category->category_name}}</option>
                @endforeach
                
                <!-- Add more categories as needed -->
            </select>
        </header>
        @livewire('product-list')
        
    </div>
@endsection 
