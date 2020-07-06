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

          {{-- @if($product->usersRated() > 0) --}}
          <p>Rating: {{round($product->averageRating(), 1) ?? 0}} /5 ({{$product->usersRated()}})</p>
          {{-- @endif --}}
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
<form class="form-horizontal poststars" action="{{route('rating.add', $product)}}" id="addStar" method="POST">
  @csrf
  
<div class="form-group required">
  <div class="col-sm-12">

    @if($product->getUserProductRating()) 
    @for($i=5; $i>=1; $i--)
      <input type="star star-{{$i}}"
              value="{{$i}}"
              id="star-{{$i}}"
              type="radio"
              name="star"
             @if($i == $product->getUserProductRating()) checked ="checked" @endif
           
              >
              <label class="star star-{{$i}}" for="star-{{$i}}"></label>
            @endfor
          @else  
        <input class="star star-1" value="1" id="star-1" type="radio" name="star">
        <label class="star star-1" for="star-1"></label> 
        <input class="star star-2" value="2" id="star-2" type="radio" name="star">
        <label class="star star-2" for="star-2"></label> 
        <input class="star star-3" value="3" id="star-3" type="radio" name="star">
        <label class="star star-3" for="star-3"></label> 
        <input class="star star-4" value="4" id="star-4" type="radio" name="star">
        <label class="star star-4" for="star-4"></label> 
        <input class="star star-5" value="5" id="star-5" type="radio" name="star">
        <label class="star star-5" for="star-5"></label> 
        @endif
    </div>
    </div>
  </form>
  </div>
  <p style="margin-top: 2%">Description: </p>
  <div class="">{{$product->description}}</div>
  

  
</div>
    <script>
      $(function(){
        $('#addStar').change('.star', function(e){
          $(this).submit();
        });
      });
    </script>
</div>    
@endsection




