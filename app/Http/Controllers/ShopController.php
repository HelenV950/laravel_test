<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class ShopController extends Controller
{
    public function index()
    {
        $products = Product::all()->where('quantity', '>', '0');
        $categories = Category::all();
    
        return view('shop.index')->with('products', $products, 'categories', $categories);
    }

    public function shopAddToCart(Request $request, Product $product)
    {

        Cart::instance('cart')->add(
            $product->id,
            $product->name,
            $request->product_count,
            $product->getPrice()
        );


        return redirect()->back()->with(['status' => 'The product was added to cart']);
    }

}
