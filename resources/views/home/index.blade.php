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

<!--  parent -->
<div class="block">
  <!--  flex-container  -->
  <div class="block__row">
    <!--  flex-element  -->
    <div class="block__element block__element_1">
      <!--  content  -->
      <div class="block__content"><a href="/category/5">cicerro</a></div>
    </div>
    <!--  flex-element  -->
    <div class="block__element block__element_2">
      <!--  content  -->
      <div class="block__content"><a href="/category/3">dolorum</a></div>
    </div>
    <!--  flex-element  -->
    <div class="block__element block__element_3">
      <!--  content  -->
      <div class="block__content"><a href="/category/1">quae</a></div>
    </div>
    <!--  flex-element  -->
    <div class="block__element block__element_4">
      <!--  content  -->
      <div class="block__content"><a href="/category/2">iste</a></div>
    </div>
    <!--  flex-element  -->
    <div class="block__element block__element_5">
      <!--  content  -->
      <div class="block__content"><a href="/category/4">lorem</a></div>
    </div>
  </div>
</div>



@endsection