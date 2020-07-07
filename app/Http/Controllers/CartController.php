<?php

namespace App\Http\Controllers;


use App\Models\Order;
use App\Models\OrderStatus;
use App\Models\Product;
use App\Models\User;
use COM;
//use Gloudemans\Shoppingcart\Cart as ShoppingcartCart;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function index()
    {
        return view('shop.cart.index');
    }

    public function add(Request $request, Product $product)
    {

        Cart::instance('cart')->add(
            $product->id,
            $product->name,
            $request->product_count,
            $product->getPrice()
        );


        return redirect()->back()->with(['status' => 'The product was added to cart']);
    }


    public function update(Request $request, Product $product)
    {
        if($request->product_count > $product->quantity){
            return redirect()->back()->with(['status'=>'Product count should be less then' . $product->quantity ]);
        }

        Cart::instance('cart')->update(
            $request->rowId,
            $request->product_count
        );
        return redirect()->back()->with(['status'=>'The product ' . $product->name . ' count was updated']);
    }


    // public function getAddByOne( $id)
    // {
    //     $oldCart = Session::has('cart') ? Session::get('cart') : null;
    //     $cart = new Cart($oldCart);

    //     $cart->addByOne($id);


    //     Session::put('cart', $cart);

    //     return redirect()->route('product.shoppingCart');
    // }



    // public function getReduceByOne($id)
    // {
    //     $oldCart = Session::has('cart') ? Session::get('cart') : null;
    //     $cart = new Cart($oldCart);
    //     $cart->reduceByOne($id);

    //     if (count($cart->items) > 0) {
    //         Session::put('cart', $cart);
    //     } else {
    //         Session::forget('cart');
    //     }

    //     return redirect()->route('product.shoppingCart');
    // }


    // public function getRemoveItem($id)
    // {
    //     $oldCart = Session::has('cart') ? Session::get('cart') : null;
    //     $cart = new Cart($oldCart);
    //     $cart->removeItem($id);

    //     if (count($cart->items) > 0) {
    //         Session::put('cart', $cart);
    //     } else {
    //         Session::forget('cart');
    //     }


    //     return redirect()->route('product.shoppingCart');
    // }




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

    // public function create(Request $request, Order $order, User $user, Product $product)
    // {
    //     if (!Session::has('cart')) {
    //         return redirect()->route('shop.shoppingCart')
    //             ->with(['status' => 'The cart is empty']);
    //     }
    //     $oldCart = Session::get('cart');
    //     $cart = new Cart($oldCart);
    //     $total = $cart->totalPrice;
    //     $user = Auth::user();

    //     $order_status = OrderStatus::where('type', '=', 'Paid')->first();

    //     $order->cart = serialize($cart);

    // //dd($order->cart);
    //     $order->create([
    //         'user_id' => $user->id,
    //         'user_name' => $request->input('user_name'),
    //         'user_surname' => $request->input('user_surname'),
    //         'user_email' => $request->input('user_email'),
    //         'user_phone' => $request->input('user_phone'),
    //         'country' => $request->input('country'),
    //         'city' => $request->input('city'),
    //         'address' => $request->input('address'),
    //         'total' => $total,
    //         'status_id' => $order_status->id
    //     ]);



    // dd($cart);
    //foreach ($cart as $items){
    //foreach ($items as $item){
    //dd($item['product']['name']);
    //}
    // };
    //dd($cart->items);


    //     Session::forget('cart');
    //     return redirect()->route('index')->with(['success' => 'Successfully purchased products!']);
    // }

    public function delete(Request $request, Product $product)
    {
        //dd($request);
        //$product->images()->delete();
        Cart::instance('cart')->remove($request->rowId);
        
        return redirect()->back()
            ->with(['status' => 'The product was removed']);
    }
}
