<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'id', 
        'user_name', 
        'user_surname',
        'user_email', 
        'user_phone', 
        'country', 
        'city',
        'address',
        'total'
    
     ];

     public function status()
     {
         return $this->belongsTo(\App\Models\OrderStatus::class);
     }


     public function users()
     {
         return $this->belongsTo(\App\Models\User::class);
     }

     
     public function products()
     {
         return $this->hasMany(\App\Models\Product::class);
     }


}
