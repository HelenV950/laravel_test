@extends('layouts.app')

@section('title')
Shopping Cart
@endsection
<?php
//dd($products);
?>

@section('content')
  @if(Session::has('cart'))
  <div class="container">
  <div class="row">
    <div class="col-sm-9 col-md-9 col-md-offset-3 col-sm-offset-3">
      <ul class="list-group">
        @foreach($products as $product)
            <li class="list-group-item">
              {{-- <div class="col-md-12">
                 <img src="{{Storage::disk('public')->url($product['product']['thumbnail'])}}" height="250" width="250"/> 
              </div>     --}}
            <strong>{{$product['product']['name']}}</strong>  
             <span class ="label label-success">price <strong>{{$product['price']}}</strong></span>
             <span class="">quantity <strong>{{$product['qty']}}</strong></span>
              <div class="btn-group">
                <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown">
                  Action <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                  <li><a href="{{route('product.addByOne', ['id'=>$product['product']['id']])}}">Add by 1</a></li>
                  <li><a href="{{route('product.reduceByOne', ['id'=>$product['product']['id']])}}">Reduce by 1</a></li>
                  <li><a href="{{route('product.remove', ['id'=>$product['product']['id']])}}">Reduce by all</a></li>
                </ul>
              </div>
            </li>
        @endforeach
      </ul>
    </div>
  </div>



  <div class="row-right">
    <div class="col-sm-9 col-md-9 col-md-offset-3 col-sm-offset-3">
      <strong>Total{{$totalPrice}}</strong>
    </div>
  </div>
  <hr>
  <div class="row-right">
    <div class="col-sm-9 col-md-9 col-md-offset-3 col-sm-offset-3">
      <a href="{{'checkout'}}" type="button" class="btn btn-success">Checkout</a>
    </div>
  </div>
  @else
  <div class="row">
    <div class="col-sm-12 col-md-12 col-md-offset-3 col-sm-offset-3">
     <h2>No items in Cart!</h2>
    </div>
  </div>
</div>
@endif
@endsection