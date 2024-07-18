<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    public function store(Request $request){
        // 
        $product=Product::findOrFail($request->product_id);
        Cart::add($product->id, $product->product_name, 1, $product->price);

        return redirect()->route('index')->with('success','product added to cart');
    }
}
