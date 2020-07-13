<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class ProductController extends Controller
{


    /**
     * Display the specified resource.
     *
     * @param  Product $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
  
        $comments = $product->comments()->with('user')->paginate(5);
        return view('shop.product.show', compact('product',  'comments'));
    }

}
