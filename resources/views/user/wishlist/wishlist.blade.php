@extends('layouts.app')

@section('title')
Wish List
@endsection



@section('content')

 
  @if(Cart::instance('wishlist')->count() > 0)
  <div class="container">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/">Home</a></li>
      <li class="breadcrumb-item"><a href="/shop">Shop</a></li>
      <li class="breadcrumb-item active" aria-current="page">WishList</li>
    </ol>

    <h1 class="text-center">Wish list</h1>
    <div class="row justify-content-md-center">
    
      <div class="col-sm-10 col-md-10 col-md-offset-3 col-sm-offset-3">
       
       <table class="table table-light">
          <thead>
            <tr>
             <th>Product</th>
             <th>Price</th>
             <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @each('user.wishlist.parts.wishlist_view', Cart::instance('wishlist')->content(), 'row')
          </tbody>
       </table>
                       
      </div>
    </div>



  @else

  <div class="row justify-content-center">
         <h2>No items in Wish List!</h2> 
    
  </div> 
</div> 
@endif
@endsection