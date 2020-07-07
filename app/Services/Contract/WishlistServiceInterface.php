<?php
namespace App\Services\Contract;

use App\Models\Product;



interface WishlistServiceInterface
{
  /**
   * Check if current is followed on product 
   * 
   * @param Product $product
   */
  public function isUserFollowed(Product $product);

  public function addItem(Product $product);

  public function deleteItem(Product $product);

  
}
