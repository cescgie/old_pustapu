<div class="container">
<div class="row list-group products">

   <?php echo Message::show(); ?>
  <?php
   echo '<ol class="breadcrumb">
      <li><a href="'.DIR .'folder/">Folder</a></li>';
      foreach ($data['fname2'] as $fold2) {
        echo  '<li><a href="'.DIR .'folder/depth1/'.$fold2['id'].'">Year ('.$fold2['name'].')</a></li>';
      }
      foreach ($data['fname1'] as $fold1) {
        echo  '<li><a href="'.DIR .'folder/depth2/'.$fold1['id'].'">Month ('.$fold1['name'].')</a></li>';
      }
      foreach ($data['fname'] as $folder) {
      echo '<li class="active">Day ('.$folder['name'].')</li>
        </ol>
        ';
    }  ?>

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
                          <th >Month</th>
                        </tr>
                    </thead>
                    <tbody id="mediaList" class="hp-optionsTable">';
         foreach ($data['folder'] as $folder) {
                  echo
                     '<tr>
                        <td><a rel="group" href="' . DIR . 'folder/depth4/' . $folder['id'] . '"><span class="glyphicon glyphicon-folder-open">  '.$folder['name'].'</span></a></td>
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