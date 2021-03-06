<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'id', 
        'SKU', 
        'name',
        'description', 
        'shot_description', 
        'price', 
        'discount',
        'quantity',
           
     ];

     public function categories()
     {
         return $this->belongsToMany(\App\Models\Category::class);
     }

     public function orders()
     {
         return $this->belongsToMany(\App\Models\Order::class)->withPivot('quantity', 'price');
     }


     public function thumbnail()
     {
         return $this->morphOne(\App\Models\Image::class, 'imageable');
     }

     
     public function image()
     {
         return $this->morphMany(\App\Models\Image::class, 'imageable');
     }
}
