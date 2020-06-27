@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
           
<h2>Hello, {{ Auth::user()->name }} !</h2>
<hr>
<?php
//dd( Auth::user());
?>



<table class="table table-bordered">
   
    <tbody>
      <tr>
        <th scope="row">Name</th>
        <td>{{ Auth::user()->name }}</td>
       
     
      </tr>
      <tr>
        <th scope="row">Surname</th>
        <td>{{ Auth::user()->surname }}</td>
    
      </tr>
      <tr>
        <th scope="row">Phone</th>
      
        <td>{{ Auth::user()->phone }}</td>
      </tr>
      <tr>
        <th scope="row">Email</th>
      
        <td>{{ Auth::user()->email }}</td>
      </tr>
    </tbody>
  </table>




  <div class="form-group row mb-0">
      <div class="col-md-8">
         <a href="{{ route('user.profile.edit') }}">
            {{ __('Do you want update your profile?') }}
         </a>
           
      </div>
  </div>


@endsection