<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

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
      
        $products = Product::inRandomOrder()->take(3)->get();
        //$products = Product::with('category')->where('quantity', '>', '0')->paginate(10);
        $categories = Category::all();
        return view('home.index', compact('categories', 'products'));
    }

    public function homeAddToCart(Request $request, Product $product)
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
