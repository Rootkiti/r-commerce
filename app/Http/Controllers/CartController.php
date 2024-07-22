<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;

// use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    public function store($id){
        // 
        // $product=Product::findOrFail($request->product_id);
        // Cart::add($product->id, $product->product_name, 1, $product->price);

        // return redirect()->route('index')->with('success','product added to cart');
        // dd($id);
        $product_id = $id;
        $user_id = auth()->user()->id;
        $data['user_id'] = $user_id;
        $data['product_id'] = $product_id;                   
            
        $cart = Cart::create($data);

        return redirect()->back();
        
    }

    public function cartContent(){
        if(auth()->user()){
            $user_id =  auth()->user()->id;
            
            $count = Cart::where('user_id',$user_id)->count();
            $cart = Cart::where('user_id',$user_id)->get();
            return view('cart.cartContent')->with(['carts'=>$count,'items'=>$cart]);

        }
        else{
            $count = 0;
            return view('cart.cartContent')->with(['carts'=>$count,'items'=>0]);
        }
       

            // return view('index', compact('count'));
    }

    public function test(){
        return view('admin');
    }
}
