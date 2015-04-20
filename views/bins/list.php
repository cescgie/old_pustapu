<div class="container">
  <div class="row list-group products">


   <?php echo Message::show(); ?>

   <?php
  
   echo '<ol class="breadcrumb">
      <li><a href="'.DIR .'folder/">Folder</a></li>';
      foreach ($data['fname1'] as $fold) {
        echo  '<li><a href="'.DIR .'folder/selectFolder/'.$fold['id'].'">Date ('.$fold['name'].')</a></li>';
      }
      foreach ($data['fname'] as $folder) {
        echo '<li class="active">Hour ('.$folder['name'].')</li>';
      }
        echo'
        </ol>
        ';
     ?>

   <?php
   /*echo '<br><br>
   <div class="btn-group btn-group-justified" role="group" aria-label="...">
     <div class="btn-group" role="group">
       <a type="button" href="' .DIR.'bins/list"  class="btn btn-default">GA</a>
     </div>
     <div class="btn-group" role="group">
       <a type="button" href="#" class="btn btn-default">Middle</a>
     </div>
     <div class="btn-group" role="group">
       <a type="button" href="#"  class="btn btn-default">Right</a>
     </div>
   </div>';*/
   ?>

   
   <?php
      if (!sizeof($data['bin'])) {
         echo '<div class="alert alert-info">Derzeit gibt es keine Bin-Datei.</div>';
      }
      else {
         echo 
            '<div class="panel panel-default">
              <!-- Default panel contents -->
               <div class="panel-heading">Panel heading</div>
                  <!-- Table -->
                  <table border="0px" class="table">
                     <thead>
                        <tr>
                          <th>Bin name</th>
                          <th>Option</th>
                        </tr>
                    </thead>
                    <tbody id="mediaList" class="hp-optionsTable">';
         foreach ($data['bin'] as $bin) {
                  echo
                     '<tr>
                        <td>'.$bin['filetitle'].'</td>
                        <td><!-- Single button -->
                            <div class="btn-group">
                              <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                Action <span class="caret"></span>
                              </button>
                              <ul class="dropdown-menu" role="menu">';
                              if (substr($bin['filetitle'], -7) == '.bin.gz'){
                              echo
                                '<li><a href="'.DIR .'bins/tar_convert/'.$bin['id'].'">Convert</a></li>';
                              }
                              if (substr($bin['filetitle'], -4) == '.bin'){
                              echo 
                                '<li><a href="#">Parse</a></li>';
                              }
                              echo
                                '<li><a href="#">Delete</a></li>
                              </ul>
                            </div>
                        </td>
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