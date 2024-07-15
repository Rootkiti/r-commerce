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
                    <a href="{{route('login')}}" class="nav-link" rel="noopener noreferrer">Login</a>
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
                <option value="smartphones">Smartphones</option>
                <option value="laptops">Laptops</option>
                <option value="tablets">Tablets</option>
                <!-- Add more categories as needed -->
            </select>
        </header>
        <div class="product-list">
            @foreach($products as $product)
                <div class="product-item">
                    <img src="images/image-1.jpeg" alt="{{ $product['name'] }}">
                    <h2>{{ $product['name'] }}</h2>
                    <p>{{ $product['cost'] }}</p>
                    <button class="add-to-cart" data-name="{{ $product['name'] }}" data-cost="{{ $product['cost'] }}">Add to Cart</button>
                    <a href="#" class="more-info" data-description="{{ $product['description'] }}">More Info</a>
                </div>
            @endforeach
        </div>
        <div class="cart">
            <h2>Shopping Cart</h2>
            <ul id="cart-items"></ul>
            <p>Total: <span id="cart-total">$0</span></p>
        </div>
    </div>
@endsection 
