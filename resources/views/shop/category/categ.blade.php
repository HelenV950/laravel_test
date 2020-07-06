

<div class="col-sm-6 col-md-4">
  <div class="card shadow-sm" >
     {{-- <a href="{{route('product.show', $product)}}"> --}}

       {{-- <div class="cart-img ">
         <img src="{{Storage::disk('public')->url($product->thumbnail)}}" class="card-img-top" alt="..." ></div> 
     </a> --}}

     <div class="cart-link">
       
       {{-- <a class="badge badge-pill badge-light flot-right" href="{{route('product.show', $product->id)}}"><i class="fa fa-eye" aria-hidden="true"></i></a> --}}
       {{-- <a class="badge badge-pill badge-light flot-right" href="#"><i class="fa fa-heart-o fa-2x" aria-hidden="true"></i></a> --}}
                   
     </div>
   
 
    <div class="card-body">
      <a href="{{route('category.show', $category)}}">
        <h5 class="card-title">{{$category->title}}</h5>
      </a>
      
       <p class="card-text">{{$category->description}}</p>
      
         

     

     
    </div>
  </div>
 </div>