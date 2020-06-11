@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
           
            <div class="card">
                <div class="card-header">Create Category</div>

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


                  <form method="POST" action="{{ route('admin.categories.update', $category) }}">
                        @csrf
                        @method("PUT")

                      <div class="form-group row">
                          <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

                          <div class="col-md-6">
                              <input id="title" 
                              type="text" 
                              class="form-control @error('title') is-invalid @enderror" 
                              name="title" 
                              value="{{$category->tite ?? ''}}" 
                              required 
                              autofocus>

                              @error('title')
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
                             required>
                            {{$category->description ?? ''}}</textarea>

                              @error('description')
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
              </div>
            </div>
        </div>
    </div>
</div>
@endsection