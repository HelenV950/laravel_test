<?php

namespace App\Models;

use Gloudemans\Shoppingcart\CanBeBought;
use Gloudemans\Shoppingcart\Contracts\Buyable;
use willvincent\Rateable\Rateable;
use Illuminate\Database\Eloquent\Model;


class Product extends Model implements Buyable
{

    use CanBeBought, Rateable;
    

    protected $fillable = [
        'id',
        'category_id',
        'SKU',
        'name',
        'description',
        'shot_description',
        'price',
        'discount',
        'quantity',
        'thumbnail'

    ];

    public function category()
    {
        return $this->belongsTo(\App\Models\Category::class);
    }

    public function orders()
    {

        return $this->belongsToMany(\App\Models\Order::class, 'order_product', 'order_id', 'product_id')
            ->withPivot('quantity', 'price')
            ->withTimestamps();
    }


    public function images()
    {
        return $this->morphMany(\App\Models\Image::class, 'imageable');
    }


    public function getShotDescriptionAttribute()
    {
        $more = strlen($this->description) > 100 ? '...' : '';

        return substr($this->description, 0, 100) . $more;
    }


    public function printPrice()
    {
        $price = $this->price;

        if ($this->discount > 0) {
            $price -= ($price / 100 * $this->discount);
        }

        return round($price, 2);
    }

    public function getPrice()
    {
      return  $this->printPrice();
        
    }

    /**
     * @return mixed
     */
    public function getUserProductRating()
    {
         $vote = $this->ratings()->where([
           ['user_id', auth()->id()],
           ['rateable_id', $this->id] 
        ])->first();

        return !empty($vote->rating) ? $vote->rating : false;
    }
}
