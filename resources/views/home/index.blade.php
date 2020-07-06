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

@include('shop.product.product_view')

@endforeach
</div>
@endforeach

  <div class="text-center button-container mt-2">
    <a href="/shop" class="button">View more products</a>
  </div>     

@endsection