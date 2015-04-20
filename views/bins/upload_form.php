

   <?php echo Message::show(); ?>
   <?php
   /*
	   echo '<form enctype="multipart/form-data"  action="' . DIR . 'bins/upload/'.$data['fid'].'" method="post">
	   File: <input name="uploaded" type="file" />
	   <input type="submit" name="upfile" value="Upload File"></form>';
   	*/
   ?>
   <?php 
	echo 
		'<a href="#" data-toggle="modal" class="btn btn-primary" data-target=".pop-up-s'.$data['fid'].'">
                           Upload File
                              </a>
                            <!--  Modal content for the image -->
                            <div class="modal fade pop-up-s'.$data['fid'].'" id="rating-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel-1" aria-hidden="true">
                              <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h4 class="modal-title" id="myLargeModalLabel-1">...</h4>
                                  </div>
                                  <div class="modal-body">
									<form id="ratting-form" data-async data-target="#rating-modal" action="' . DIR . 'bins/uploads/'.$data['fid'].'" class="dropzone"  >
									           <input type="hidden" name="'.$data['fid'].'"> 
									      </form>                                  
								   </div>
                                  <div class="modal-footer">
								      <button class="btn btn-primary" data-dismiss="modal" onclick="myFunctionRel()">Close</button>
								  </div>
                                </div><!-- /.modal-content -->
                              </div><!-- /.modal-dialog -->
                            </div><!-- /.modal image -->';
 ?>
 </div>
<hr>