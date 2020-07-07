<?php
namespace App\Services;

use App\Services\Contract\WishlistServiceInterface;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;


class WishlistService implements WishlistServiceInterface 
{
    public function isUserFollowed(Product $product)
    {
      //dd($product);
      return false;
    }

    public function addItem(Product $product)
    {
      //dd($product);
      Cart::instance('wishlist')->add([
          $product->id,
          $product->name,
          1,
          $product->getPrice()
      ])->store(auth()->user()->instanceCartName());
    }

    public function deleteItem(Product $product)
    {
      dd($product);
    }

}