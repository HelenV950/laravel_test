<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateOrderRequest;
use App\Models\Order;

use App\Models\OrderStatus;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{


    public function getOrderByUser()
    {
        
        $orders = Auth::user()->orders;
      //  $order = Order::with('product')->find(1);
        // $cartItem = Cart::instance('cart')->content();
        // $products = Order::find(1);
        dd($order);
              

        return view('user/orders', compact('orders'));

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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
