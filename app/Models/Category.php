<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'id', 
        'title', 
        'description'
       
         ];

         public function products()
     {
         return $this->hasMany(\App\Models\Product::class);
     }

     public function image()
     {
         return $this->morphOne(\App\Models\Image::class, 'imageable');
     }
}
