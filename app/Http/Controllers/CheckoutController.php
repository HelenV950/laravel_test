<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        
        return view('shop.checkout.index');
    }

    
    // public function getCheckout()
    // {

    //     if (!Session::has('cart')) {
    //         return view('shop.shopping-cart', ['products' => null])
    //             ->with(['status' => 'The cart is empty']);
    //     }
    //     $oldCart = Session::get('cart');
    //     $cart = new Cart($oldCart);
    //     $total = $cart->totalPrice;

    //     $user = Auth::user();

    //     //dd($user->id);
    //     return view('shop.checkout', ['total' => $total, 'user' => $user]);
    // }

}
