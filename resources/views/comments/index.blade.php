<div class="col-md-12">
  <hr>
    <h4>COMMENTS</h4>
    <div class="col-cm-12">
      @each('comments.single', $comments, 'comment')
      <br>
      {{$comments->links()}}
    </div>
    <div class="col-cm-12">

          @auth 
            @include('comments.add_comment', ['product'=>$product])
          @endauth
    </div>

    @push('footer-scripts')
    
  <script>
    $(function(){
      $(document).on('click', '.reply', function(e){
        e.preventDefault();
        let userName = $(this).parent().find('.user_name').text();
        $('#parent_id').val($(this).data('parent_id'));
        $('#comment').val('@${userName} ');
        $('html, body').animate({
          scrollTop: $("omment").offset().top - 40
        }, 2000);
        $('#comment').focus();
  
      });
    });
  </script>
    @endpush



</div>