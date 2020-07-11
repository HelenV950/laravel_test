<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function add(Request $request, Product $product)
    {
       dd($request); 
    }
}
