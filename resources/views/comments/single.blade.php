<div class="col-sm-12" style="padding: 5px; border-top: 1px solid #d3d3d3; margin: 4px 0; ">
  {{dd($comment->user->name)}}
  <p><strong>{{$comment->user->name}}</strong> - <small>{{$comment->created_at}}</small></p>
  <hr>
  <p>{{$comment->comment}}</p>
  @if(!null($comment->childes()))
    <div class="col-sm-12">
      @each('comments.single', $comment->childes, 'comment')
    </div>
  @endif
</div>