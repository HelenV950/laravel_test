@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
           
<h2>users profile</h2>
<?php
//dd($users);
?>
<table class="table table-hover"> 
    <thead class="thead-light">
      <tr>
        <th scope="col">N</th>
        <th scope="col">Name</th>
        <th scope="col">Surname</th>
        <th scope="col">Email</th>
        <th scope="col">Phone</th>
        <th scope="col">BirthDate</th>
      </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
      <tr>
        <th scope="row">{{$user->id}}</th>
        <td>{{$user->name}}</td>
        <td>{{$user->surname}}</td>
        <td>{{$user->email}}</td>
        <td>{{$user->phone}}</td>
        <td>{{$user->birth_date}}</td>
      </tr>
     @endforeach
    </tbody>
  </table>

        </div>
    </div>
</div>
@endsection