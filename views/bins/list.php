<div class="row list-group products">

   <?php echo Message::show(); ?>
   <?php
   echo '<form enctype="multipart/form-data"  action="' . DIR . 'bins/upload/" method="post">
   File: <input name="uploaded" type="file" />
   <input type="submit" name="upfile" value="Upload File"></form>';
   ?>

   
   <?php
      if (!sizeof($data['bins'])) {
         echo '<div class="alert alert-info">Derzeit gibt es keine Bin-Datei.</div>';
      }
      else {
         echo 
            '<div class="panel panel-default">
              <!-- Default panel contents -->
               <div class="panel-heading">Panel heading</div>
                  <!-- Table -->
                  <table border="1px" class="table">
                     <thead>
                        <tr>
                          <th >Name</th>
                        </tr>
                    </thead>
                    <tbody id="mediaList" class="hp-optionsTable">';
         foreach ($data['bins'] as $bin) {
                  echo
                     '<tr>
                        <td >'.$bin['name'].'</td>
                     </tr>';
         }
                  echo 
                     '</tbody>
                </table>
            </div>';
      }
   ?>

</div> <!-- / .products -->