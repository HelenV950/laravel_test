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

<h2>All product</h2>

  @foreach($products->chunk(3) as $productChunk)
   <div class="row">
     @foreach($productChunk as $product)
      <div class="col-sm-6 col-md-4">
        <div class="thumbnail">
          <img src="{{Storage::disk('public')->url($product->thumbnail)}}" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">{{$product->name}}</h5>
            <p class="card-text">{{$product->shot_description}}.</p>
            {{-- @if(!empty($product->categories)) --}}
           {{-- <p>{{$product->category->title}}</p> --}}
                {{-- <a href="{{route('category.show')}}">{{$product->category->title}}</a>  --}}
              @include('shop.category-view', ['category'=>$product->category()->first()]) 
            {{-- @endif --}}
          


            <div class="d-flex justify-content-between align-item-center">
              <div class="btn-group">
                <a href="#">
                {{-- <a href="{{route('product.show', $product->id)}}"> --}}
                  <div class="btn btn-sm btn-outline-dark">
                    {{__('Show')}}
                  </div>
                </a>
              </div>
            </div>


              <div class="clearfix">
                @if($product->discount > 0)
                  <small style="color: red; text-declarations: line-through">${{$product->price}}</small>
                @endif
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