@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
           
<h2>orders profile</h2>
<?php
//dd($users);
?>
<table class="table table-hover"> 
    <thead class="thead-light">
      <tr>
        <th scope="col">N</th>
        <th scope="col">User_Name</th>
        <th scope="col">User_Surname</th>
        <th scope="col">Email</th>
        <th scope="col">Phone</th>
        <th scope="col">Country</th>
        <th scope="col">City</th>
        <th scope="col">Address</th>
        <th scope="col">Total</th>
        <th scope="col">Status</th>
      </tr>
    </thead>
    <tbody>
        @foreach($orders as $order)
      <tr>
        <th scope="row">{{$order->id}}</th>
        <td>{{$order->user_name}}</td>
        <td>{{$order->user_surname}}</td>
        <td>{{$order->user_email}}</td>
        <td>{{$order->user_phone}}</td>
        <td>{{$order->country}}</td>
        <td>{{$order->city}}</td>
        <td>{{$order->address}}</td>
        <td>{{$order->total}}</td>
        <td>{{$order->status['type']}}</td>
      </tr>
     @endforeach
    </tbody>
  </table>

        </div>
    </div>
</div>
@endsection