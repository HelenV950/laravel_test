
   <div class="col-sm-6 col-md-4">
     <div class="card shadow-sm" >
        <a href="{{route('product.show', $product)}}">

          <div class="cart-img ">
            <img src="{{Storage::disk('public')->url($product->thumbnail)}}" class="card-img-top" alt="..." ></div> 
        </a>

        <div class="cart-link">
          
          {{-- <a class="badge badge-pill badge-light flot-right" href="{{route('product.show', $product->id)}}"><i class="fa fa-eye" aria-hidden="true"></i></a> --}}
          <a class="badge badge-pill badge-light flot-right" href="#"><i class="fa fa-heart-o fa-2x" aria-hidden="true"></i></a>
                      
        </div>
      
    
       <div class="card-body">
         <h5 class="card-title">{{$product->name}}</h5>
          <p class="card-text">{{$product->shot_description}}.</p>
         
            @if(!empty($product->category)) 
     
              @include('shop.category-view', ['category' => $product->category()->first()]) 
            @endif 
       

        

           <div class="clearfix ">
             <div class="price">
             @if($product->discount > 0)
               <small style="color: red; text-decoration: line-through">${{$product->price}}</small>
             @endif
             <div class="printPrice">${{$product->printPrice()}}</div>
            </div>
             {{-- <a href="{{route('product.addToCart', ['id' => $product->id])}}" class="btn btn-primary pull-right">Add to Cart </a> --}}

             <form action="{{route('shop.AddToCart', $product)}}" method="POST" class="form-inline" id="button_center>             
              @method('POST')
              @csrf
              <div class="form-froup  mb-2">
                <input type="hidden" name="price_with_discount" value="">
                <label for="product_count" class="sr-only">Count</label>
                 <input type="hidden"
                        name="product_count"
                        class="form-content"
                        id="product_count"
                        min="1"
                        max="1"
                        value="1"
                      > 
      
              </div> 
            

                <button type="submit" class="btn btn-primary mt-2" id="button_center">Add to Cart</button>
           
            
            </form>






             {{-- <a href="{{route('shop.addToCart', $product)}}" class="btn btn-primary pull-right">Add to Cart </a> --}}
           </div>
       </div>
     </div>
    </div>

  
                