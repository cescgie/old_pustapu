<div class="row list-group products">

   <?php echo Message::show(); ?>

   <?php
      if (!sizeof($data['folder'])) {
         echo '<div class="alert alert-info">Derzeit gibt es keine Folder.</div>';
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
                          <th >Folder Name</th>
                        </tr>
                    </thead>
                    <tbody id="mediaList" class="hp-optionsTable">';
         foreach ($data['folder'] as $folder) {
                  echo
                     '<tr>
                        <td >'.$folder['name'].'</td>
                     </tr>';
         }
                  echo 
                     '</tbody>
                </table>
            </div>';
      }
   ?>

</div> <!-- / .products -->