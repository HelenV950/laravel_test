@extends('layouts.app')

@section('title')
All Products
@endsection

@section('content')


<div class="container">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Shop</li>
  </ol>

<div class="row">
  <div class="col-md-2">
    <aside class="product-section container">
      <div class="sidebar">
        <h6>By Category</h6>
          <div class="category_link mt-3">
            <div><a href="{{route('category.index')}}">all categories</a></div>

    
        @each('shop.category-view', $categories, 'category') 
  
    
    </div>
  </div>
</aside>
</div>

<div class="col-md-10">
  
  <div class="products">
    @foreach($products->chunk(3) as $productChunk)
<div class="row">
  @foreach($productChunk as $product)

@include('shop.product.product_view')

@endforeach
</div>
@endforeach
  </div>
</div>
</div>
</div>
@endsection