<div class="row list-group products">

   <?php echo Message::show(); ?>

   <?php
      if (!sizeof($data['lists'])) {
         echo '<div class="alert alert-info">Derzeit gibt es keine Liste. <a href="' . DIR . 'products/add">Leg gleich welche an</a>!</div>';
      }
      else {
         foreach ($data['lists'] as $list) {
            echo
            '<p>"'.$list['IpAddress'].'"</p>';
         }
      }
   ?>

</div> <!-- / .products -->