<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>r-commerce Landing Page</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>
<body>
    <div class="container">
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
    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
