@extends('layouts.app')

@section('title')
Checkout
@endsection


@section('content')
<div class="container">
  <h1 class="text-center">Checkout</h1>
  <div class="row justify-content-space-between">
    <div class="col-md-6">
    

      {{-- <h4>Your Total: $ {{Cart::total()}}</h4>   --}}

        {{-- <div id="charge-error" class="alert alert-danger" {{!Session::has('error') ? 'hidden' : ''}}>
        {{Session::get('error')}}
        </div> --}}
        @if($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
          </ul>
        </div>
        @endif
     

        <form action="{{route('order.create')}}" method="POST" id="checkout-form">
          @csrf
               
          <div class="">
            <div class="form-group">
              <label for="user_name">Name</label>
               <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ Auth()->user()->name }}" autocomplete="name" autofocus>
            </div>
          </div>
          <div class="">
            <div class="form-group">
              <label for="user_surname">Surname</label>
              <input type="text" id="surname" name="surname" class="form-control @error('surname') is-invalid @enderror" value="{{ Auth()->user()->surname  }}" autocomplete="surname" autofocus>
            </div>
          </div>
          <div class="">
            <div class="form-group">
              <label for="user_email">Email</label>
              <input type="text" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ Auth()->user()->email  }}" autocomplete="email" autofocus>
            </div>
          </div>
          <div class="">
            <div class="form-group">
              <label for="user_phone">Phone</label>
              <input type="text" id="phone" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ Auth()->user()->phone }}">
            </div>
          </div>
       
          <hr>
          <div class="">
            <div class="form-group">
              <label for="country">Country</label>
              <input type="text" id="country" name="country" class="form-control @error('country') is-invalid @enderror" required>
            </div>
          </div>
          <div class="">
            <div class="form-group">
              <label for="city">City</label>
              <input type="text" id="city" name="city" class="form-control @error('city') is-invalid @enderror" required>
            </div>
          </div>
          <div class="">
            <div class="form-group">
              <label for="addres">Address</label>
              <input type="text" id="address" name="address" class="form-control @error('address') is-invalid @enderror" required>
            </div>
          </div>
          <hr>
         {{-- <div class="">
            <div class="form-group">
              <label for="card-name">Card Holder Name</label>
              <input type="text" id="card-name" class="form-control" >
            </div>
          </div>
          <div class="">
            <div class="form-group">
              <label for="card-number">Credit Card Number</label>
              <input type="text" id="card-nunber" class="form-control" >
            </div>
          </div>
          <div class="">
            <div class="row">
              <div class="col">
                <div class="form-group">
                  <label for="card-expiry-month">Expiration Month</label>
                  <input type="text" id="card-expiry-month" class="form-control">
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label for="card-expiry-year">Expiration Year</label>
                  <input type="text" id="card-expiry-year" class="form-control" >
                </div>
              </div>
            </div>
          </div>
          <div class="">
            <div class="form-group">
              <label for="card-cvc">CVC</label>
              <input type="text" id="card-cvc" class="form-control" >
            </div>
          </div>  --}}
          {{-- <div class="">
            <div class="form-group">
              <label for="card-cvc">total</label>
              <input type="text" id="total" name="total" class="form-control" value="{{$total}}">
            </div>
          </div>
        --}}
        @csrf
        <button type="submit" class="btn btn-success">Buy now</button>
     
        </form>
      </div>

      <div class="col"></div>

<div class="col-md-5">
  <table class="table">
    <thead class="thead-light">
      <tr>
       <th>Product</th >
       <th>Qty</th>
       <th>Price</th>
       <th>Subtotal</th>
      </tr>
    </thead>
    <tbody>
      @each('shop.cart.parts.checkout_view', Cart::instance('cart')->content(), 'row')
    </tbody>
 </table>
 <div class="row-right">
<strong>Total {{Cart::total()}}</strong>
  </div>

</div>

   
  </div>
</div>

 
@endsection