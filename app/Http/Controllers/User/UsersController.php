<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function getOrder()
   {
    $orders = Auth::user()->orders;
    $orders->transform(function($order, $key){
        $order->cart = unserialize($order->cart);
        return $order;
    });

    return view('user/orders', ['orders' => $orders]);
    }
 }
