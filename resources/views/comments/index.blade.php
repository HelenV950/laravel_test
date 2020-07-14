<div class="col-md-12">
  <hr>
    <p>COMMENTS:</p>
    <div class="col-cm-12">
      @each('comments.single', $comments, 'comment')
      <br>
      {{$comments->links()}}
    </div>
    <div class="col-cm-12">

          @auth 
            {{-- @include('comments.add_comment', ['product'=>$product]) --}}
          @endauth
    </div>

    @push('footer-scripts')
      <script>
          $(function(){
            $(document).on('click', '.reply', function(e){
              e.preventDefault();

             // alert($(this).data('parent_id'));
              let userName = $(this).parent().find('.user_name').text();
             $(this).parent().parent().append(`<form action="{{route('comments.add', $product)}}" method="POST"  style="margin: 16px auto; border: 1px solid #333; padding: 16px; width: 50%;">
  @csrf
  <h6>New comment</h6>
<input type="hidden" name="parent_id" id="parent_id">
<hr>
<textarea name="comment" id="comment" class="form-control" rows="10"></textarea>
<button type="submit" class="btn btn-outline-primary form-control mt-3">Add comment</button>
</form>`);  
           // alert(userName);

              $('#parent_id').val($(this).data('parent_id'));
              $('#comment').val('@${userName} ');
              // $('html, body').animate({
              //   scrollTop: $("#comment").offset().top - 40
              // }, 2000);
              // $('#comment').focus();
        
            });
          });
      </script>
    @endpush



</div>