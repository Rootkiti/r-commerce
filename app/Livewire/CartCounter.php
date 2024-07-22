<?php

namespace App\Livewire;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
// use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Cart;
class CartCounter extends Component
{
    public function render()
    {
        if(auth()->user())
        {
            $user_id =  auth()->user()->id;
                
            $count = Cart::count('user_id',$user_id);
            $cart = Cart::where('user_id',$user_id)->get();
            return view('livewire.cart-counter', compact('count','cart'));

        }
        else{
           
            $count = 0;
            return view('livewire.cart-counter', compact('count'));

        }
        
    }
}
