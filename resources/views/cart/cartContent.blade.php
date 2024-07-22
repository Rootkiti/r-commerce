@extends('layouts.layouts')
@section('title', 'Cart')
@section('content')
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

                    @foreach ($items as $item)
                    {{-- {{$item->id}} --}}
                    {{$item->Product_id}}
                        
                    @endforeach

                </li>
            </ul>
        </span>
        </div>
</div>
</nav>
{{-- @php
 $cart= \Gloudemans\Shoppingcart\Facades\Cart::content()->count();  
 $contents = \Gloudemans\Shoppingcart\Facades\Cart::content()->groupBy('id');  
 $keys = $contents->keys();
 $c = \Gloudemans\Shoppingcart\Facades\Cart::instance('wishlist')->content();
@endphp
@if ($cart == 0)
    cart is empty
@else
    value :{{\Gloudemans\Shoppingcart\Facades\Cart::subtotal();}}
    <br>
    {{-- {{$cart}} --}}
    {{-- @foreach($keys as $key)
    {{$key}}
    {{$contents[$key]}}
    @endforeach
@endif
{{$carts}} --}} 
@endsection


