@extends('layouts.app')

@section('title')
Shopping Cart
@endsection



@section('content')
  {{-- @if(Session::has('cart')) --}}
  @if(Cart::instance('cart')->count() > 0)
  <div class="container">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/">Home</a></li>
      <li class="breadcrumb-item"><a href="/shop">Shop</a></li>
      <li class="breadcrumb-item active" aria-current="page">Cart</li>
    </ol>

    <h1 class="text-center">Cart</h1>
    <div class="row justify-content-md-center">
    
      <div class="col-sm-10 col-md-10 col-md-offset-3 col-sm-offset-3">
       
       <table class="table table-light">
          <thead>
            <tr>
             <th>Product</th>
             <th>Qty</th>
             <th>Price</th>
             <th>Subtotal</th>
            </tr>
          </thead>
          <tbody>
            @each('shop.cart.parts.cart_view', Cart::instance('cart')->content(), 'row')
          </tbody>
       </table>
                       
      </div>
    </div>


 
  <div class="row-right mt-5">
    <div class="col-sm-11 col-md-11 col-md-offset-3 col-sm-offset-3">
    <div>
    <span><strong>Total {{Cart::total()}}</strong></span>
    </div>
    <div class="mt-3">
       <a href="{{'/checkout'}}" type="button" class="btn btn-success">Checkout</a> 
      {{-- <a href="#" type="button" class="btn btn-success">Checkout</a> --}}
    </div>
    </div>
  </div>

  @else

  <div class="row justify-content-center">
         <h2>No items in Cart!</h2> 
    
  </div>
</div>
@endif
@endsection