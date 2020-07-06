<tr>
   <td>
      <a href="{{route('product.show', $row->id)}}">
      <strong>{{$row->name}}</strong>
      </a>
  </td>
     <td>    
     <span>{{$row->qty}}</span>
    </td>
    <td>
      <span class ="label label-success"> <strong>${{$row->price}}</strong></span>
    </td>
    <td>
      <span class ="label label-success"> <strong>${{$row->total}}</strong></span>
    </td>
</tr>
 
  