<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::all();

        return view('shop.category.index')->with('categories', $categories);
    }


    public function show(Category $category)
    {

        $category->products()->get();
        $products = $category->products()->get();
        
        return view('shop.category.show', compact('category', 'products'));
    }
}
