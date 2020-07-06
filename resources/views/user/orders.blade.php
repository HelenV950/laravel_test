@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
           

<h2>My orders</h2>

@foreach($orders as $order)


<table class="table">
    <thead>
      <tr>
        <td>Order_id N{{$order['id']}}</td>
       
        <td>Total {{$order['total']}} </td>
        <td>Status {{$order['status']['type']}}</td>
        <td><div class="d-flex">
        
            <div class="dropdown mr-1">
              <button type="button" class="btn btn-secondary dropdown-toggle" id="dropdownMenuOffset" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-offset="10,20">
                My requisites
              </button>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuOffset">
                <a class="dropdown-item" href="#">{{$order['user_name']}}</a>
                <a class="dropdown-item" href="#">{{$order['user_surname']}}</a>
                <a class="dropdown-item" href="#">{{$order['user_email']}}</a>
                <a class="dropdown-item" href="#">{{$order['user_phone']}}</a>
                <a class="dropdown-item" href="#">{{$order['user_country']}}</a>
                <a class="dropdown-item" href="#">{{$order['user_city']}}</a>
                <a class="dropdown-item" href="#">{{$order['user_address']}}</a>
              </div>
            </div> 
           
          </div> 
              </button>
           
            </div>
           
           </div> </td>
        <td><div class="d-flex">
            <div class="dropdown mr-1">
              <button type="button" class="btn btn-secondary dropdown-toggle" id="dropdownMenuOffset" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-offset="10,20">
               My products
              </button>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuOffset">
                <a class="dropdown-item" href="#">@each('shop.cart.parts.myOrder_view', Cart::instance('cart')->content(), 'row')</a>
              

          
              </div>
            </div>
           

          

          </div> </th>
      </tr>
    </thead>

  </table>

@endforeach
        </div>
    </div>
</div>

@endsection