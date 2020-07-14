<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Product;


class CommentController extends Controller
{
    public function add(Request $request, Product $product)
    {
       //dd($request->comment); 
        $data = $request->all();
        unset($data['_token']);
        $data['user_id'] = auth()->id();
        $product->comments()->create($data);


      return redirect()->back()->with(['status' => 'Comment was added']);
    }

    public function show(Request $request, Product $product)
    {
      return view('comments.all_comments');
    }
}
