<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
// use App\Http\Controllers\Auth;

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

    public function remove($id){
        // return view('admin');
        Cart::find($id)->delete();
        return redirect()->back();
    }

    public function comfirm_order(Request $request){
        $request->validate(
            [
                'name'=>'required',
                'address'=>'required',
                'phone'=>'required'

            ]
            
            );
            $user_id= auth()->user()->id;
            $cart = Cart::where('user_id',$user_id)->get();
            foreach($cart as $item){
                $order = new Order;
                $order->name = $request->name;
                $order->address = $request->address;
                $order->phone = $request->phone;
                $order->user_id= auth()->user()->id;
                $order->product_id = $item->Product_id;

                $order->save();
                
            }

            $cart_remove = Cart::where('user_id',$user_id)->get();

            foreach($cart_remove as $remove){
                $data = Cart::find($remove->id);
                $data->delete();

            }
            
            return redirect()->back();
    }
}
