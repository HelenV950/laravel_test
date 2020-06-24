@extends('layouts.app')

@section('content')
<div class="container">
@if(Session::has('success'))
  <div class="row">
    <div class="col-sm-6 col-md-4">
      <div class="alert alert-success">
        {{Session::get('success')}}
      </div>
    </div>
  </div>
@endif
  @foreach($products->chunk(3) as $productChunk)
   <div class="row">
     @foreach($productChunk as $product)
      <div class="col-sm-6 col-md-4">
        <div class="thumbnail">
          <img src="{{Storage::disk('public')->url($product->thumbnail)}}" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">{{$product->name}}</h5>
            <p class="card-text">{{$product->shot_description}}.</p>
              <div class="clearfix">
                <div class="price">${{$product->price}}</div>
                <a href="{{route('product.addToCart', ['id' => $product->id])}}" class="btn btn-primary pull-right">Add to Cart </a>
              </div>
          </div>
        </div>
      </div>
      @endforeach
  </div>
  @endforeach

@endsection