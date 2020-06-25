@extends('layouts.app')

@section('title')
Checkout
@endsection


@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8">
        <h1>Checkout</h1>
        <h4>Your Total: ${{$total}}</h4>

        <div id="charge-error" class="alert alert-danger" {{!Session::has('error') ? 'hidden' : ''}}>
        {{Session::get('error')}}
        </div>

        <form action="{{route('order.create')}}" method="POST" id="checkout-form">
{{--           
          <div class="hidden">
            <div class="form-group">
              <label for="user_id">id</label>
               <input type="text" id="user_id" name="user_id" class="form-control" value="{{ $user->id ?? '' }}" required>
            </div>
          </div> --}}
          <div class="">
            <div class="form-group">
              <label for="user_name">Name</label>
               <input type="text" id="user_name" name="user_name" class="form-control" value="{{ $user->name ?? '' }}" required>
            </div>
          </div>
          <div class="">
            <div class="form-group">
              <label for="user_surname">Surname</label>
              <input type="text" id="user_surname" name="user_surname" class="form-control" value="{{ $user->surname ?? '' }}" required>
            </div>
          </div>
          <div class="">
            <div class="form-group">
              <label for="user_email">Email</label>
              <input type="text" id="user_email" name="user_email" class="form-control" value="{{ $user->email ?? '' }}" required>
            </div>
          </div>
          <div class="">
            <div class="form-group">
              <label for="user_phone">Phone</label>
              <input type="text" id="user_phone" name="user_phone" class="form-control" value="{{ $user->phone ?? '' }}" required>
            </div>
          </div>
       
          <hr>
          <div class="">
            <div class="form-group">
              <label for="country">Country</label>
              <input type="text" id="country" name="country" class="form-control" required>
            </div>
          </div>
          <div class="">
            <div class="form-group">
              <label for="city">City</label>
              <input type="text" id="city" name="city" class="form-control" required>
            </div>
          </div>
          <div class="">
            <div class="form-group">
              <label for="addres">Address</label>
              <input type="text" id="address" name="address" class="form-control" required>
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
  </div>
</div>

 
@endsection