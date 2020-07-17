<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateOrderRequest;
use App\Models\Order;
use App\Models\Product;

use App\Models\OrderStatus;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{


    public function getOrderByUser(Product $product)
    {
        
        $orders = Auth::user()->orders;
    
        foreach($orders as $order){
          $product = $order->products();
        }
     
        $order->products()->first();

        //$product =  $order->products()->orderBy('name')->get();
        //dd($product);
   
        return view('user/orders', compact('orders', 'product'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(CreateOrderRequest $request)
    {
        $user = auth()->user();
        $cartTotal = (float) Cart::instance('cart')->total(2, '.', '');
        $cartItem = Cart::instance('cart')->content();

      //  dd($cartItem);

        if($cartTotal > auth()->user()->balance){
            return redirect()->back()->with(['customeError'=>'You don`t have enough money on your balance']);
        }

        $fields = $request->validated();
        $status = OrderStatus::where('type', '=', config('orders_statuses.in_process'))->first();

        

        $order  = Order::create([
            'user_id'      => $user->id,
            'user_name'    => $fields['name'],
            'user_surname' => $fields['surname'],
            'user_email'   => $fields['email'],
            'user_phone'   => $fields['phone'],
            'country'      => $fields['country'],
            'city'         => $fields['city'],
            'address'      => $fields['address'],
            'total'        => $cartTotal,
            'status_id'    => $status->id

        ]);

        $user->update([
           'balance' => $user->balance - $cartTotal 
        ]);

       foreach ($cartItem as $item) {
          $order->products()->attach($item->id, [
              'quantity'   => (int) $item->qty,
              'price'      => $item->price


          ]);
       }

        Cart::instance('cart')->destroy();
        //dd($user);
        return redirect()->route('thankyou', compact('order'));
    }

   }
