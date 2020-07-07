<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Services\WishlistService;


class WishlistController extends Controller
{
    public function add(Product $product, WishlistService $service)
    {
        //dd($product);
        $service->addItem($product);

        return redirect()->back()->with(['status'=>'The product was added to your wish list!']);
    }
}
