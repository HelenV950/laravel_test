<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderStatus;
use App\Models\Product;
use App\Models\User;
use COM;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function getAddToCart(Request $request, $id)
    {
        // $product = $request->all();

        $product = Product::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;

        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);

        $request->session()->put('cart', $cart);
        // dd($request->session()->get('cart'));
        return redirect()->route('index');
    }


    public function getAddByOne($id)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->addByOne($id);

        Session::put('cart', $cart);

        return redirect()->route('product.shoppingCart');
    }



    public function getReduceByOne($id)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->reduceByOne($id);

        if (count($cart->items) > 0) {
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }

        return redirect()->route('product.shoppingCart');
    }


    public function getRemoveItem($id)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);

        if (count($cart->items) > 0) {
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }


        return redirect()->route('product.shoppingCart');
    }


    public function getCart()
    {

        // $products = Product::all()->toArray();

        if (!Session::has('cart')) {
            return view('shop.shopping-cart', ['products' => null])
                ->with(['status' => 'The cart is empty']);
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        //dd($cart);
        return view('shop.shopping-cart', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
    }

    public function getCheckout()
    {

        if (!Session::has('cart')) {
            return view('shop.shopping-cart', ['products' => null])
                ->with(['status' => 'The cart is empty']);
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $total = $cart->totalPrice;

        $user = Auth::user();

        //dd($user->id);
        return view('shop.checkout', ['total' => $total, 'user' => $user]);
    }

    public function create(Request $request, Order $order, User $user)
    {
        if (!Session::has('cart')) {
            return redirect()->route('shop.shoppingCart')
                ->with(['status' => 'The cart is empty']);
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $total = $cart->totalPrice;
        $user = Auth::user();

        $order_status = OrderStatus::where('type', '=', 'Paid')->first();
  
        $order->cart = serialize($cart);
     
        $order->create([
            'user_id' => $user->id,
            'user_name' => $request->input('user_name'),
            'user_surname' => $request->input('user_surname'),
            'user_email' => $request->input('user_email'),
            'user_phone' => $request->input('user_phone'),
            'country' => $request->input('country'),
            'city' => $request->input('city'),
            'address' => $request->input('address'),
            'total' => $total,
            'status_id' => $order_status->id
        ]);

        //dd($order);
        Session::forget('cart');
        return redirect()->route('index')->with(['success' => 'Successfully purchased products!']);
    }

    public function destroy(Product $products)
    {
        $products->delete();
        //$product->images()->delete();

        return redirect(route('shop.shopping-cart'))
            ->with(['status' => 'The cart is empty!']);
    }
}
