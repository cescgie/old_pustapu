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
      <!-- Reload pop up after close button by dropzone modal -->
      <script>
      function myFunctionRel() {
          location.reload();
      }
      </script>
      <!-- Checkbox for multiple choice -->
      <script type="text/javascript">
      function toggleMediaSelection(parent) {
      	var childs = document.getElementById("mediaList").getElementsByTagName("input");
      	for (i = 0; i < childs.length; i++) {
      		if (!childs[i].disabled)
      			childs[i].checked = parent.checked;
      	}
      }
      </script>
      <!-- Ladda style script -->
      <script src="<?= URL::SCRIPTS('spin.min') ?>"></script>
      <script src="<?= URL::SCRIPTS('ladda.min') ?>"></script>
      <script type="text/javascript">
      // Bind normal buttons
      Ladda.bind( '.load button', { timeout: 100000 } );
      </script>
</body>
</html>