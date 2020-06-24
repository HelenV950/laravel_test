<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     * @param Product $products
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // dd(
        //     auth()->user()
        // );
        $products = Product::all();
        return view('layouts.index', ['products' => $products]);
    }
}
