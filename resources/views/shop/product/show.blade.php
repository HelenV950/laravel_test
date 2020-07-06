 @extends('layouts.app')

@section('content')
<div class="container">
{{-- @if(Session::has('status'))
  <div class="row">
    <div class="col-sm-6 col-md-4">
      <div class="alert alert-success">
        {{Session::get('status')}}
      </div>
    </div>
  </div>
@endif  --}}



<div class="row justify-content-center">
  <div class="col-md-12">
    <h3 class="text-center">{{__($product->name)}}</h3>
  </div>
</div>
<hr>
<div class="row">
  <div class="col-md-6">
      @if(Storage::disk('public')->has($product->thumbnail))
        <img src="{{Storage::disk('public')->url($product->thumbnail)}}" class="card-img-top" alt="">
      @endif
  </div>
  <div class="col-md-6">
    @if($product->discount > 0)
      <p style="color: red; text-decoration: line-through">Old Price: ${{$product->price}}</p>
    @endif
      <p>Price: <strong>${{$product->printPrice()}}</strong></p>
      <p>SKU: {{$product->SKU}}</p>
      <p>Quantity {{$product->quantity}}</p>
      <p>Rating: {{$product->eveageRating}}</p>
    <hr>
    <div class="">
      <p>Product Categories</p>
      @include('shop.category-view', ['category'=>$product->category()->first()])
    </div>

      {{-- @auth --}}
      @if($product->quantity > 0)
      <hr>
      <div class="">
        <p>Add to Cart:</p>
       
      <form action="{{route('cart.add', $product)}}" method="POST" class="form-inline">
        @csrf
        @method('post')
        <div class="form-froup mx-sm-3 mb-2">
          <input type="hidden" name="price_with_discount" value="">
          <label for="product_count" class="sr-only">Count</label>
           <input type="number"
                  name="product_count"
                  class="form-content"
                  id="product_count"
                  min="1"
                  max="{{$product->quantity}}"
                  value="1"> 

        </div> 
        <button type="submit" class="btn btn-primary mb-2">Buy</button>
      </form>
    </div>
      @endif
<hr>
</div>
<p style="margin-top: 2%">Description: </p>
<p>{{$product->description}}</p>
  
</div>




@endsection