<div class="row list-group products">

   <?php echo Message::show(); ?>
   <?php
	   echo '<form enctype="multipart/form-data"  action="' . DIR . 'bins/ga_upload/" method="post">
	   File: <input name="uploaded" type="file" />
	   <input type="submit" name="upfile" value="Upload File"></form>';
   ?>

   <?php
      if (!sizeof($data['count'])) {
         echo '<div class="alert alert-info">No Data.</div>';
      }
      else {
         echo 
            '<div class="panel panel-default">
              <!-- Default panel contents -->
               <div class="panel-heading">GA (Impression)</div>
                  <!-- Table -->
                  <table border="1px" class="table">
                     <thead>
                        <tr>
                          <th >IpAddress</th>
                          <th >Summe</th>
                        </tr>
                    </thead>
                    <tbody id="mediaList" class="hp-optionsTable">';
         foreach ($data['count'] as $count) {
                  echo
                     '<tr>
                        <td >'.$count['IpAddress'].'</td>
                        <td >'.$count['Summe'].'</td>
                     </tr>';
         }
                  echo 
                     '</tbody>
                </table>
            </div>';
      }
   ?>

</div> <!-- / .products -->