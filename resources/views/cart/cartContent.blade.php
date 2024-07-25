@extends('layouts.layouts')
@section('title', 'Cart')
@section('content')
<style type="text/css">
.div-content{
    display: flex;
    justify-content: center;
    align-self: center;
    margin: 60px;
}
table{
    border: 2px solid black;
    text-align: center;
    width: 800px;
}
th{
    border: 2px solid black;
    text-align: center;color: white;
    font: 20px;
    background-color: black;
    font-weight: bold;
}
td{
    border: 1px solid skyblue;
}
.order-container{
    padding-left: 150px;
    margin-top: -120px;
}
label{
    display: inline-block;
    width: 150px;
}
.form-div{
    padding: 10px;
}
</style>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
       
        <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{route('index')}}">Shop</a>
                </li>
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

    <div class="div-content">
        <table>
            <tr>
                <th> Image</th>
                <th>Name</th>
                <th>Price</th>
                <th>Remove</th>
            </tr>
            @php
                
                $total = 0;
            @endphp
            @foreach ($items as $item)
            <tr>
                <td><img src="{{$item->product->imageUrl}}" width="100" height="100" alt="product Image"></td>
                <td>{{$item->product->product_name}}</td>
                <td>{{$item->product->price}}</td>
                <td><a href="{{route('remove',$item->id)}}" type="button" class="btn btn-danger">Remove</a></td>

            </tr>

            @php
                $total = $total + $item->product->price;
            @endphp
            @endforeach
            <tr>
                <td colspan='4'> <b>Total Price: {{$total}} RWF</b></td>
            </tr>
        </table>

        <div class="order-container">
            <form action="{{route('comfirm_order')}}" method="POST">
                @csrf
                <div class="form-div">
                    <label for="name"> Receiver Name</label>
                    <input class="form-control" type="text" name="name" value="{{Auth::user()->name}}">
                    <span style="color:red;">@error('name'){{$message}}@enderror</span>

                </div>
                <div class="form-div">
                    <label for="name"> Receiver Address</label>
                    <textarea class="form-control" name="address" id="" cols="30" rows="2"></textarea>
                    <span style="color:red;">@error('address'){{$message}}@enderror</span>

                </div>
                <div class="form-div">
                    <label for="name"> Receiver Phone</label>
                    <input class="form-control" type="text" name="phone">
                    <span style="color:red;">@error('phone'){{$message}}@enderror</span>

                </div>
                <div class="form-div">
                    <input class="btn btn-primary" type="submit" value="Place Order">
                </div>
            </form>
        </div>
    </div>
    <div>
       
    </div>
@endsection


