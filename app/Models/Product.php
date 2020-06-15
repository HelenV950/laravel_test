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
        'thumbnail'
           
     ];

     public function category()
     {
         return $this->belongsTo(\App\Models\Category::class);
     }

     public function orders()
     {
         return $this->belongsToMany(\App\Models\Order::class)->withPivot('quantity', 'price');
     }

        
     public function image()
     {
         return $this->morphMany(\App\Models\Image::class, 'imageable');
     }

     public function getShotDescriptionAttribute()
     {
         $more = strlen($this->description) > 100 ? '...' : '';
 
         return substr($this->description, 0, 100) . $more;
     }
}
