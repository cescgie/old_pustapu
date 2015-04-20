<div class="container">
  <div class="row list-group products">


   <?php echo Message::show(); ?>

   <?php
  
   echo '<ol class="breadcrumb">
      <li><a href="'.DIR .'folder/">Folder</a></li>';
      foreach ($data['fname3'] as $fold2) {
        echo  '<li><a href="'.DIR .'folder/depth1/'.$fold2['id'].'">Year ('.$fold2['name'].')</a></li>';
      }
      foreach ($data['fname2'] as $fold1) {
        echo  '<li><a href="'.DIR .'folder/depth2/'.$fold1['id'].'">Month ('.$fold1['name'].')</a></li>';
      }
      foreach ($data['fname1'] as $fold) {
        echo  '<li><a href="'.DIR .'folder/depth3/'.$fold['id'].'">Date ('.$fold['name'].')</a></li>';
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
         echo '<div class="alert alert-info">No Bin-file avalaible.</div>';
      }
      else {
        //echo $folder['id'];
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
                                '
                                 <li><a href="#" data-toggle="modal" data-target=".pop-up-'.$bin['id'].'" >Delete</a></li>                          
                              </ul>
                            </div>

                            <!--  Modal content for the delete image  -->
                            <div class="modal fade pop-up-'.$bin['id'].'" id="modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel-1" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                      <div class="modal-content">

                                          <!--<div class="modal-header">
                                             <h4 class="modal-title" id="myLargeModalLabel-1">......</h4>
                                          </div>-->
                                          <div class="modal-body">
                                             <p style="color:black;">Are you sure that you want to permanently delete this file?</p>
                                          </div>
                                          <div class="modal-footer">
                                              <a class="btn btn-warning" data-dismiss="modal" aria-hidden="true">Cancel</a>
                                              <a class="btn btn-primary" href=' . DIR . 'bins/delete/' . $bin['id'] . '" >Ok</a>          
                                          </div>
                                      </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal image -->
                        </td>
                     </tr>';
         }
                  echo 
                     '</tbody>
                     <tfoot>
                          <tr>
                            <td colspan="6">
                              <a href="#" data-toggle="modal" class="btn btn-warning btn-sm" data-target=".pop-up-d'.$folder['id'].'" >Delete all files</a></li>
                               <!--  Modal content for the delete image  -->
                              <div class="modal fade pop-up-d'.$folder['id'].'" id="modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel-1" aria-hidden="true">
                                  <div class="modal-dialog modal-lg">
                                        <div class="modal-content">

                                            <!--<div class="modal-header">
                                               <h4 class="modal-title" id="myLargeModalLabel-1">......</h4>
                                            </div>-->
                                            <div class="modal-body">
                                               <p style="color:black;">Are you sure that you want to permanently delete all files?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <a class="btn btn-warning" data-dismiss="modal" aria-hidden="true">Cancel</a>
                                                <a class="btn btn-primary" href="' . DIR . 'bins/delete_all/'.$folder['id'].'" >Ok</a>          
                                            </div>
                                        </div><!-- /.modal-content -->
                                  </div><!-- /.modal-dialog -->
                              </div><!-- /.modal image -->
                            </td>
                          </tr>
                        </tfoot>
                  </table>
            </div>';
      }
   ?>

</div> <!-- / .products -->
</div>