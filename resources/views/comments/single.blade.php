<div class="col-sm-12 comment-block" style="padding: 5px 0 5px 5px; border: 1px solid #d3d3d3; margin: 4px 0;">
 
  <p class="iser-info">
    <strong class="user_name">{{$comment->user->name}}</strong> - <small>{{$comment->created_at}}</small>
    &nbsp; | &nbsp;
    <a href="#" data-parent_id="{{$comment->id}}" class="reply">Reply</a>

  </p>

  <p class="ml-3">{{$comment->comment}}</p>
      @if(!is_null($comment->childes()))
        <div class="col-sm-12 childes-block">
          @each('comments.single', $comment->childes(), 'comment')
        </div>
      @endif
</div>