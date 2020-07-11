<div class="col-md-12">
  <hr>
    <h4>COMMENTS</h4>
    <div class="col-cm-12">
      @each('comments.single', $comments, 'comment')
    </div>
    <div class="col-cm-12">


          @auth
            @include('comments.add_comment', ['product'=>$product])
          @endauth
    </div>
</div>