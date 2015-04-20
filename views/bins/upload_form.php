

   <?php echo Message::show(); ?>
   <?php
	   echo '<form enctype="multipart/form-data"  action="' . DIR . 'bins/upload/'.$data['fid'].'" method="post">
	   File: <input name="uploaded" type="file" />
	   <input type="submit" name="upfile" value="Upload File"></form>';
   ?>
 </div>
<hr>