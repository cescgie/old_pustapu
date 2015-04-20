</div> <!-- / .container -->

	  <!-- Latest compiled and minified JavaScript -->
     <script src="<?= URL::SCRIPTS('bootstrap.min') ?>"></script>
     <!-- Dropzone -->
      <script src="<?= URL::DROPZONEJS('dropzone.min') ?>"></script>
      <!-- Dropzone Modal -->
     <script type="text/javascript">
        jQuery(function($) {
              $('form[data-async]').live('submit', function(event) {
                 var $form = $(this);
                 var $target = $($form.attr('data-target'));
                  
              $.ajax({
                 type: $form.attr('method'),
                 url: $form.attr('action'),
                 data: $form.serialize(),
                  
                 success: function(data, status) {
                 $target.html(data);
                 }
              });
               
              event.preventDefault();
              });
           }); 
        </script> 

      <script>
      function myFunctionRel() {
          location.reload();
      }
      </script>
</body>
</html>