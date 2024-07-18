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
                            <a href="#" class="nav-link"> <i class="fa fa-cart-shopping"> ({{\Gloudemans\Shoppingcart\Facades\Cart::content()->count()}})</i></a>
                        </li>
                        <li>
                            <a href="{{route('login')}}" class="nav-link" rel="noopener noreferrer">Login</a>

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
        <div class="product-list">
            @foreach($products as $product)
                <div class="product-item">
                    @if(session()->has('success'))
                        <div class="alert alert-success alert-dismissible fade show">{{session('success')}}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>

                    @endif
                    <img src="{{$product->imageUrl}}" alt="{{ $product->product_name }}">
                    <h2>{{ $product->product_name}}</h2>
                    <p>{{ $product->price }}</p>
                    @if ($cart->where('id',$product->id)->count())
                        In Cart
                    @else
                        <form action="{{route('cart.store')}}" method="POST" style="border: none;">
                            @csrf
                            <input type="hidden" name="price" value="{{ $product->price }}">
                            <input type="hidden" name="name" value="{{ $product->product_name }}">
                            <input type="hidden" name="product_id" value="{{ $product->id }}">

                            <button class="btn btn-primary">Add to Cart</button>
                        </form>
                    @endif
                    
                    <a href="#" class="more-info" data-description="{{ $product->description }}">More Info</a>
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
