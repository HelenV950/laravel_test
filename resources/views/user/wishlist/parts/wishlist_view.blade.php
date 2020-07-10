<tr>
   <td>
      {{-- <img src="{{Storage::disk('public')->url($product['product']['thumbnail'])}}" height="64" width="64"/>  --}}

    {{-- <a href="{{route('product.show'), $row->id}}"> --}}
    <a href="{{route('product.show', $row->id)}}">
      <strong>{{$row->name}}</strong>
    </a>
  </td>
  <td>
    <span class ="label label-success"><strong>${{$row->price}}</strong></span>
  </td>
  
    
  <td>    
  <form action="{{route('wishlist.delete', $row->id)}}" method="POST"> 
    @method('delete')
    @csrf
    <input type="hidden" value="{{$row->rowId}}" name="rowId">

    <input type="submit" class="btn btn-outline-danger" value="{{__('delete')}}">

  </form>
  </td>
</tr>
  
  