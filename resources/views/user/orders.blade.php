@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
           

<h2>My orders</h2>
<?php
dd($oldCart);

?>
@foreach($orders as $order)
 <div class="panel panel-default">
    <div class="panel-body">
        <ul class="list-group">

          @foreach($order->cart->items as $item)
            <li class="list-group-item">
                <span class="badge">{{$item['price']}}</span>
                {{$item['item']['title']}} | {{$item['item']['qty']}} Units
            </li>
            @endforeach 

         
      
        </ul>
    </div>
    <div class="panel-footer">
         <strong>Total Price: ${{$order->cart->totalPrice}}</strong> 
    </div>
</div> 
@endforeach
        </div>
    </div>
</div>
@endsection