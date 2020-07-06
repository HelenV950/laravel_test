<div class="row">
      <a href="{{route('product.show', $row->id)}}">
      <strong>{{$row->name}}</strong>
      </a>
    
     <span>  {{$row->qty}}  x <strong> ${{$row->price}}</strong> </span> 
    
</div>   
      {{-- <span class ="label label-success"> <strong>${{$row->total}}</strong></span> --}}

  