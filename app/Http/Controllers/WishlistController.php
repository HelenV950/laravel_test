<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Services\WishlistService;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;


class WishlistController extends Controller
{

public function userList()
{
    return view('user.wishlist.wishlist');
}


    public function add(Product $product, WishlistService $service)
    {
        //dd($product);
        $service->addItem($product);

        return redirect()->back()->with(['status'=>'The product was added to your wish list!']);

    }
    public function delete(Request $request, Product $product, WishlistService $service)
    {
        //dd($product);
        $service->deleteItem($request->rowId, $product);
        Cart::instance('wishlist')->remove($request->rowId);

        return redirect()->back()->with(['status'=>'The product ('. $product->name .') was deleted from your wish list!']);
    }
}
