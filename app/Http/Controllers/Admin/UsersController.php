<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin/usersProfile', ['users' => $users]);
    }


    public function edit()
    {
        
    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getOrders()
    {
        $orders = Order::all(); 
        //dd('hi');                                        
        return view('admin/ordersProfile', ['orders' => $orders]);
    }
}
