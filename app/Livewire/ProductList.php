<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;

class ProductList extends Component
{
    public function render()
    {
        // Normally, you'd fetch this data from a database.
        $products = Product::all();
        $categories = Category::all();
        $cart = Cart::content();
        
        return view('livewire.product-list', compact('products','cart'));
    }

    public function addToCart($product_id){
        //
    }
}
