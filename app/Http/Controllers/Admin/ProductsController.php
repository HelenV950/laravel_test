<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with('category')->paginate(5);
        // dd($products);
        return view('admin/products/index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all()->toArray();
        //dd($categories);
        return view('admin/products/create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProductRequest $request)
    {
        //dd($request->file('product_images'));
        $product = $request->all();

       // dd($request);
        unset($product['product_images']);
        unset($product['thumbnail']);
        unset($product['_token']);

        if (!empty($request->file('thumbnail'))) {
            $imageService   = app()->make(\App\Services\Contract\ImageServiceInterface::class);
            $filePath       = $imageService->upload($request->file('thumbnail'));
            $product['thumbnail'] = $filePath;
        }

        $product = Product::create($product);
        //dd($product);

        if (!empty($request->file('product_images'))) {

            foreach ($request->file('product_images') as $image) {
                $filePath       = $imageService->upload($image);
                $product->images()->create(['path' => $filePath]);
            }
        }

        return redirect(route('admin.products.index'))
            ->with(['status' => 'The product has been created']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Product $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::all()->toArray();
        $images = $product->images;
       // dd($images);
        return view('admin/products/edit', compact('categories', 'product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        //dd($request->files);
        $product->update([
            'SKU'               => $request->get('SKU'),
            'name'              => $request->get('name'),
            'category'          => $request->get('category'),
            'thumbnail'         => $request->get('thumbnail'),
            'shot_description'  => $request->get('shot_description'),
            'price'             => $request->get('price'),
            'discount'          => $request->get('discount'),
            'quantity'          => $request->get('quantity')
        ]);

      
        if (!empty($request->file('image'))) {
            $imageService   = app()->make(\App\Services\Contract\ImageServiceInterface::class);
            $filePath       = $imageService->upload($request->file('image'));
            $oldImage       = $product->image()->first();

            if (!is_null($oldImage)) {
                $imageService->remove($oldImage->path);
            }
    
            if (is_null($oldImage)) {
                $product->image()->create(['path' => $filePath]);
            } else {
                $product->image()->update(['path' => $filePath]);
            }
        }
      
      

        return redirect()
            ->back()
            ->with(['status' => 'The product was successfully updated!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Product $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        $product->images()->delete();

        return redirect(route('admin.products.index'))
            ->with(['status' => 'The product was successfully removed!']);
    }
}
