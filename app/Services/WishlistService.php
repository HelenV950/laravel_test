<?php
namespace App\Services;

use App\Services\Contract\WishlistServiceInterface;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;


class WishlistService implements WishlistServiceInterface 
{
    /**
     * check if user followed on products
     * @param Product $product
     * @return bool|mixed
     */


    public function isUserFollowed(Product $product)
    {
      //$follower = $product->followers()->where('user_id', auth()->id())->first();
      //dd($follower);
      return !is_null($follower);
      //return false;
    }

    /**
     * add product to wishlist
     * @param Product $product
     */
    public function addItem( Product $product)
    {
      $user = Auth::user();
      $user->addToWish($product);

    
      Cart::instance('wishlist')->add(
          $product->id,
          $product->name,
          1,
          $product->getPrice()
      );

      Cart::instance('wishlist')->store(auth()->user()->instanceCartName());
    }


    /**
     * remove product from wishlist
     * @param string $rowId
     */
    public function deleteItem(string $rowId, Product $product)
    {
      auth()->user()->removeFromWish($product);
      Cart::instance('wishlist')->restore(Auth::user()->instanceCartName());
 
    }

   
}