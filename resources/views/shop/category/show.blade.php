@extends('layouts.app')

@section('title')
 Products by {{$category['title']}} 
@endsection

@section('content')

<div class="container">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/">Home</a></li>
    <li class="breadcrumb-item "><a href="/shop">Shop</a></li>
    <li class="breadcrumb-item "><a href="{{route('category.index')}}">All Categories</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{$category['title']}}</li> 
  </ol>

<div class="row">
  <div class="col-md-2">
<aside class="product-section container">
  <div class="sidebar">
    <h6>By Category</h6>
    <ul class="categories">
      <li><a href="{{route('category.index')}}">all categories</a></li>
      <li><a href="#">provident</a></li>
      <li><a href="#">beatae</a></li>
      <li><a href="#">veniam</a></li>
      <li><a href="#">veniam</a></li>
    </ul>
  </div>
</aside>
</div>

<div class="col-md-10">
  
  <h1 class="text-center">Products by {{$category['title']}}</h1>

  <div class="products text-center">
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