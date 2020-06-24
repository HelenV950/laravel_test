          <tr>
             <th scope="row">{{$product->SKU}}</th>
             <th><img src="{{Storage::disk('public')->url($product->thumbnail)}}" height="50" width="50"></th>
             <td>{{$product->name}}</td>

           <td><a href="{{route('admin.products.edit', $product->category->id)}}">{{$product->category->title}}</a></td>
             <td>{{$product->shot_description}}</td>
             <td>
               <div style="display: flex; flex-direction: row; align-item: center; justify-conrent: center">
                <a href="{{route('admin.products.edit', $product)}}"
                style="margin-right: 6px;"
                class="btn btn-warning">Edit</a>
                <form action="{{route('admin.products.destroy', $product)}}" method="post">
                  @csrf
                   @method('DELETE')
                   <button class="btn btn-danger">Remove</button>
                </form>
               </div>
            </td>

           </tr>
           
       
  
                