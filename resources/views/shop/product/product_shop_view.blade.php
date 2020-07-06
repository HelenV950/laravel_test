
   <div class="col-sm-6 col-md-4">
     <div class="card md-4 shadow-sm" >
        <a href="{{route('cart.add', $product)}}">

          <div class="cart-img ">
            <img src="{{Storage::disk('public')->url($product->thumbnail)}}" class="card-img-top" alt="..." ></div> 
        </a>

        <div class="cart-link">
          
         
          <a class="badge badge-pill badge-light flot-right" href="#"><i class="fa fa-heart-o fa-2x" aria-hidden="true"></i></a>
                      
        </div>
      
    
       <div class="card-body">
         <h5 class="card-title">{{$product->name}}</h5>
          <p class="card-text">{{$product->shot_description}}</p>
         
            @if(!empty($product->category)) 
     
              @include('shop.category-view', ['category' => $product->category()->first()]) 
            @endif 
       

        

           <div class="clearfix ">
             <div class="price">
             @if($product->discount > 0)
               <small style="color: red; text-decoration: line-through">${{$product->price}}</small>
             @endif
             <div class="">${{$product->printPrice()}}</div>
            </div>
             {{-- <a href="{{route('shop.addToCart', ['id' => $product->id])}}" class="btn btn-primary pull-right">Add to Cart </a> --}}
             <a href="{{route('cart.add', $product)}}" class="btn btn-primary pull-right">Add to Cart </a>
           </div>
       </div>
     </div>
    </div>

  
                