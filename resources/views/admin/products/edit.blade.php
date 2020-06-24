@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
           
            <div class="card">
                <div class="card-header">Update Product</div>

                <div class="card-body">

                    @if($errors->any())
                    <div class="alert alert-danger">
                      <ul>
                        @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                        @endforeach
                      </ul>
                    </div>
                    @endif


                  <form method="POST" action="{{ route('admin.products.update', $product) }}" enctype="multipart/form-data">
                        @csrf
                        @method("PUT")

                     
                        <div class="form-group row">
                            <label for="SKU" class="col-md-4 col-form-label text-md-right">{{ __('SKU') }}</label>
  
                            <div class="col-md-6">
                                <input id="SKU" 
                                type="text" 
                                class="form-control @error('SKU') is-invalid @enderror" 
                                name="SKU" 
                                value="{{ $product->SKU ?? '' }}" 
                                required 
                                autofocus>
  
                                @error('SKU')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
  
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
  
                            <div class="col-md-6">
                                <input id="name" 
                                type="text" 
                                class="form-control @error('name') is-invalid @enderror" 
                                name="name" 
                                value="{{ $product->name ?? '' }}" 
                                required 
                                autofocus>
  
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                         <div class="form-group row">
                          <label for="category_id" class="col-md-4 col-form-label text-md-right">{{ __('Category') }}</label>
                          <div class="col-md-6">
                            <select name="category_id" id="category_id" class="form-control">
                                @foreach($categories as $category)
                                    <option value="{{$category['id']}}"
                                    @if($category['id'] === $product->category_id) selected="selected" @endif
                                    >{{$category['title']}}</option>
                                @endforeach
                                </select>

                              @error('category_id')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <div class="col-md-12">
                                   @if(!empty($product->thumbnail))
                                        <img src="{{Storage::disk('public')->url($product->thumbnail)}}" height="250" width="250"/> 
                                    @endif

                            </div>
                            <label for="thumbnail" class="col-md-4 col-form-label text-md-right">{{ __('Thumbnail') }}</label>
  
                            <div class="col-md-6">
                                <input id="thumbnail" 
                                type="file" 
                                class="form-control @error('thumbnail') is-invalid @enderror" 
                                name="thumbnail" 
                                value="{{ old('thumbnail') }}">
  
                                @error('thumbnail')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                
                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>
  
                            <div class="col-md-6">
                               <textarea name="description" 
                               id="description" 
                               class="form-control" 
                               cols="30" rows="10"
                              >
                              {{ $product->description ?? ''}}</textarea>
  
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="shot_description" class="col-md-4 col-form-label text-md-right">{{ __('Shot Description') }}</label>
  
                            <div class="col-md-6">
                               <textarea name="shot_description" 
                               id="shot_description" 
                               class="form-control" 
                               cols="30" rows="10"
                               maxlength="200"
                               required>
                              {{$product->shot_description ?? ''}}</textarea>
  
                                @error('shot_description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('Price') }}</label>
  
                            <div class="col-md-6">
                                <input id="price" 
                                type="number" 
                                class="form-control @error('price') is-invalid @enderror" 
                                name="price" 
                                value="{{$product->price ?? 0 }}" 
                                required 
                                autofocus>
  
                                @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                  

                         
                      <div class="form-group row">
                        <label for="discount" class="col-md-4 col-form-label text-md-right">{{ __('Discount') }}</label>

                        <div class="col-md-6">
                            <input id="discount" 
                            type="number" 
                            class="form-control @error('discount') is-invalid @enderror" 
                            name="discount" 
                            value="{{$product->discount ?? 0 }}" 
                            min="0"
                            max="100"
                            required 
                            autofocus>

                            @error('discount')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
              

                    <div class="form-group row">
                        <label for="quantity" class="col-md-4 col-form-label text-md-right">{{ __('Quantity') }}</label>

                        <div class="col-md-6">
                            <input id="quantity" 
                            type="number" 
                            class="form-control @error('quantity') is-invalid @enderror" 
                            name="quantity" 
                            value="{{ $product->quantity ?? 0 }}" 
                            min="0"
                            required 
                            autofocus>

                            @error('quantity')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                @include('admin.products.parts.images')


                      <div class="form-group row mb-0">
                          <div class="col-md-8 offset-md-4">
                              <button type="submit" class="btn btn-primary">
                                  {{ __('Update') }}
                              </button>

                          
                          </div>
                      </div>
                  </form>
              </div>
            </div>
        </div>
    </div>
</div>
@endsection