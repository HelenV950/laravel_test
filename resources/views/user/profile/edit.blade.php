@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
           
<h2>Hello, {{ Auth::user()->name }} !</h2>
<hr>
<?php
//dd( Auth::user()->id);
?>

<form method="POST" action="{{ route('user.profile.update') }}" enctype="multipart/form-data">
    @csrf
      {{-- @method("PUT")  --}}

 
    <div class="form-group row">
        <label for="Name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

        <div class="col-md-6">
            <input id="name" 
            type="text" 
            class="form-control @error('name') is-invalid @enderror" 
            name="name" 
            value="{{ Auth::user()->name ?? 0}}" 
           
            autofocus>

            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="Surname" class="col-md-4 col-form-label text-md-right">{{ __('SurName') }}</label>

        <div class="col-md-6">
            <input id="surname" 
            type="text" 
            class="form-control @error('surname') is-invalid @enderror" 
            name="surname" 
            value="{{ Auth::user()->surname ?? 0}}" 
          
            autofocus>

            @error('surname')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
     

    <div class="form-group row">
        <label for="Surname" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>

        <div class="col-md-6">
            <input id="email" 
            type="email" 
            class="form-control @error('email') is-invalid @enderror" 
            name="email" 
            value="{{ Auth::user()->email ?? 0}}" 
          
            autofocus>

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
     


    <div class="form-group row">
        <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>

        <div class="col-md-6">
            <input id="phone" 
            type="text" 
            class="form-control @error('phone') is-invalid @enderror" 
            name="phone" 
            value="{{Auth::user()->phone ?? 0 }}" 
          
            autofocus>

            @error('phone')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>  


   



  <div class="form-group row mb-0">
      <div class="col-md-8 offset-md-4">
          <button type="submit" class="btn btn-primary">
              {{ __('Update') }}
          </button>

      
      </div>
  </div>
</form>

@endsection