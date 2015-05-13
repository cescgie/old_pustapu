<div class="container">
  <div class="row list-group products">
    <hr>

   <?php echo Message::show(); ?>

   <?php
  
   /*echo '<ol class="breadcrumb">
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
        ';*/
        echo 
        '<ol class="breadcrumb">
          <li><a href="'.DIR .'folder/">'.strtoupper(Session::get('general')).' Folder</a></li>';
            foreach ($data['fname1'] as $folds) {
              echo  '<li><a href="'.DIR .'folder/date/'.$folds['id'].'">Date ('.$folds['name'].')</a></li>';
            }
            foreach ($data['fname'] as $folder) {
             echo 
          '<li class="active">Time ('.$folder['name'].')</li>
        </ol>
        ';
      }
      ?>
   
   <?php
      if (!sizeof($data['bin'])) {
         echo '<div class="alert alert-info">No file avalaible.</div>';
      }
      else {
        //echo $folder['id'];
         echo 
            '<div class="panel panel-default">
              <!-- Default panel contents -->
               <div class="panel-heading text-center">
                  <a href="#" data-toggle="modal" class="btn btn-info btn-sm" data-target=".pop-up-e'.$folder['id'].'" >Convert available file(s) .gz  to .bin</a></li>
                  <a href="#" data-toggle="modal" class="btn btn-primary btn-sm" data-target=".pop-up-g'.$folder['id'].'" >Parse available file(s) into database</a></li>
               </div>
                  <!-- Table -->
                  <table border="0px" class="table">
                     <thead>
                        <tr>
                          <th>Bin name</th>
                          <th>Bin size</th>
                          <th></th>
                        </tr>
                    </thead>
                    <tbody id="mediaList" class="hp-optionsTable">';
         foreach ($data['bin'] as $bin) {
                  echo
                     '<tr>
                        <td>'.$bin['filetitle'].'</td>';
                        /* File size */
                        $precision=2;
                        if($bin['filesize']>pow(1024,2)){
                          echo '<td>' . round($bin['filesize']/pow(1024,2), $precision).' MB</td>';
                        }elseif ($bin['filesize']>1024) {
                          echo '<td>' . round($bin['filesize']/1024, $precision).' KB</td>';
                        }else{
                          echo '<td>'.$bin['filesize'].' B</td>';
                        }
                        echo
                        '<td><!-- Single button -->
                            <div class="btn-group">
                              <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                Action <span class="caret"></span>
                              </button>
                              <ul class="dropdown-menu" role="menu">';
                              if (substr($bin['filetitle'], -7) == '.bin.gz'){
                              echo
                                '<li><a href="'.DIR .'bins/tar_convert/'.$bin['id'].'">Convert file</a></li>
                                 <li><a href="#" data-toggle="modal" data-target=".pop-up-'.$bin['id'].'" >Delete file</a></li>';
                              }
                              if (substr($bin['filetitle'], -4) == '.bin'){
                              echo 
                                '<li><a href="#" data-toggle="modal" data-target=".pop-up-c'.$bin['id'].'" >Parse file</a></li>
                                 <li><a href="#" data-toggle="modal" data-target=".pop-up-'.$bin['id'].'" >Delete file</a></li>';
                              }
                              if (substr($bin['filetitle'], -9) == '.bin.done'){
                              echo
                                '<li><a href="#" data-toggle="modal" data-target=".pop-up-a'.$bin['id'].'" >Delete records in database</a></li>';
                              }
                              echo
                                '
                              </ul>
                            </div>

                            <!--  Modal content for the delete file  -->
                            <div class="modal fade pop-up-'.$bin['id'].'" id="modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel-1" aria-hidden="true">
                                <div class="modal-dialog">
                                      <div class="modal-content">

                                          <!--<div class="modal-header">
                                             <h4 class="modal-title" id="myLargeModalLabel-1">......</h4>
                                          </div>-->
                                          <div class="modal-body">
                                             <p style="color:black;">Are you sure that you want to permanently delete this file?</p>
                                          </div>
                                          <div class="modal-footer">
                                              <a class="btn btn-primary" data-dismiss="modal" aria-hidden="true">Cancel</a>
                                              <a class="btn btn-danger" href="' . DIR . 'bins/delete/' . $bin['id'] . '" >Delete</a>          
                                          </div>
                                      </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal image -->

                            <!--  Modal content for the delete file  -->
                            <div class="modal fade pop-up-a'.$bin['id'].'" id="modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel-1" aria-hidden="true">
                                <div class="modal-dialog">
                                      <div class="modal-content">

                                          <!--<div class="modal-header">
                                             <h4 class="modal-title" id="myLargeModalLabel-1">......</h4>
                                          </div>-->
                                          <div class="modal-body">
                                             <p style="color:black;">Are you sure that you want to permanently delete records from this file in database?</p>
                                          </div>
                                          <div class="modal-footer">
                                              <section class="load">
                                                <a class="btn btn-warning" data-dismiss="modal" aria-hidden="true">Cancel</a>
                                                <a href="' . DIR . 'bins/delete_db/' . $bin['id'] . '"  >
                                                  <button class="btn btn-danger ladda-button" data-color="red" data-style="zoom-in">Delete</button>
                                                </a>
                                              </section>          
                                          </div>
                                      </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal image -->

                            <!--  Modal content for the delete file and database  -->
                            <div class="modal fade pop-up-c'.$bin['id'].'" id="modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel-1" aria-hidden="true">
                                <div class="modal-dialog">
                                      <div class="modal-content">

                                          <!--<div class="modal-header">
                                             <h4 class="modal-title" id="myLargeModalLabel-1">......</h4>
                                          </div>-->
                                          <div class="modal-body">
                                             <p style="color:black;">Are you sure that you want to parse this file into database?</p>
                                          </div>
                                          <div class="modal-footer">
                                              <section class="load">
                                                <a class="btn btn-warning" data-dismiss="modal" aria-hidden="true">Cancel</a>
                                                <a href="'.DIR .Session::get('general').'/parse/'.$bin['id'].'">
                                                  <button class="btn btn-primary ladda-button" data-color="blue" data-style="zoom-in">Parse</button>
                                                </a>
                                              </section>
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
                              <!--<div style="text-align:right;"><a href="#" data-toggle="modal" class="btn btn-danger btn-sm" data-target=".pop-up-d'.$folder['id'].'" >Delete all file(s)</a></div>-->
                               <!--  Modal content for the delete file  -->
                              <div class="modal fade pop-up-d'.$folder['id'].'" id="modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel-1" aria-hidden="true">
                                  <div class="modal-dialog">
                                        <div class="modal-content">

                                            <!--<div class="modal-header">
                                               <h4 class="modal-title" id="myLargeModalLabel-1">......</h4>
                                            </div>-->
                                            <div class="modal-body">
                                               <p style="color:black;">Are you sure that you want to permanently delete all files?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <a class="btn btn-primary" data-dismiss="modal" aria-hidden="true">Cancel</a>
                                                <a class="btn btn-danger" href="' . DIR . 'bins/delete_all/'.$folder['id'].'" >Delete</a>          
                                            </div>
                                        </div><!-- /.modal-content -->
                                  </div><!-- /.modal-dialog -->
                              </div><!-- /.modal image -->
                               <!--  Modal content for the convert files  -->
                              <div class="modal fade pop-up-e'.$folder['id'].'" id="modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel-1" aria-hidden="true">
                                  <div class="modal-dialog">
                                        <div class="modal-content">

                                            <!--<div class="modal-header">
                                               <h4 class="modal-title" id="myLargeModalLabel-1">......</h4>
                                            </div>-->
                                            <div class="modal-body">
                                               <p style="color:black;">Are you sure that you want to convert all files?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <section class="load">
                                                <a class="btn btn-warning" data-dismiss="modal" aria-hidden="true">Cancel</a>
                                                <a href="' . DIR . 'bins/convert_all/'.$folder['id'].'">
                                                  <button class="btn btn-primary ladda-button" data-color="blue" data-style="zoom-in">Convert all</button>
                                                </a>
                                              </section>        
                                            </div>
                                        </div><!-- /.modal-content -->
                                  </div><!-- /.modal-dialog -->
                              </div><!-- /.modal image -->

                              <!--  Modal content for the parse multiple files  -->
                              <div class="modal fade pop-up-g'.$folder['id'].'" id="modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel-1" aria-hidden="true">
                                  <div class="modal-dialog">
                                        <div class="modal-content">

                                            <!--<div class="modal-header">
                                               <h4 class="modal-title" id="myLargeModalLabel-1">......</h4>
                                            </div>-->
                                            <div class="modal-body">
                                               <p style="color:black;">Are you sure that you want to parse all files into database?</p>
                                            </div>
                                            <div class="modal-footer">
                                              <section class="load">
                                                <a class="btn btn-warning" data-dismiss="modal" aria-hidden="true">Cancel</a>
                                                <a href="' . DIR .Session::get('general').'/parse_all/'.$folder['id'].'" >
                                                  <button class="btn btn-primary ladda-button" data-color="blue" data-style="zoom-in">Parse</button>
                                                </a>
                                              </section>      
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