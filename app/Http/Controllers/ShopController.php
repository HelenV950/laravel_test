<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        $products = Product::all()->where('quantity', '>', '0');
        return view('shop.index')->with('products', $products);
    }
}
