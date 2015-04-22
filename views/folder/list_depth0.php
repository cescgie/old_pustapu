<div class="container">
<div class="row list-group products">
 <hr>
   <?php echo Message::show(); ?>

   <ol class="breadcrumb">
    <li><a href="<?= DIR ?>folder/">Folder</a></li>
  </ol>
   <?php
      if (!sizeof($data['folder'])) {
         echo '<div class="alert alert-info">No Folder.</div>';
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
                          <th >Year</th>
                        </tr>
                    </thead>
                    <tbody id="mediaList" class="hp-optionsTable">';
         foreach ($data['folder'] as $folder) {
                  echo
                     '<tr>
                        <td><a rel="group" href="' . DIR . 'folder/depth1/' . $folder['id'] . '"><span class="glyphicon glyphicon-folder-open">  '.$folder['name'].'</span></a></td>
                     </tr>';
         }
                  echo 
                     '</tbody>
                </table>
            </div>';
      }
   ?>

</div> <!-- / .products -->
</div>