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
            @include('comments.add_comment', ['product'=>$product])
          @endauth
    </div>

    @push('footer-scripts')
      <script>
          $(function(){
            $(document).on('click', '.reply', function(e){
              e.preventDefault();

             // alert($(this).data('parent_id'));
              let userName = $(this).parent().find('.user_name').text();
             // $(this).parent().parent().append('<h5>hi</h5');  
            //alert(userName);

              $('#parent_id').val($(this).data('parent_id'));
              $('#comment').val('@${userName} ');
              $('html, body').animate({
                scrollTop: $("#comment").offset().top - 40
              }, 2000);
              $('#comment').focus();
        
            });
          });
      </script>
    @endpush



</div>