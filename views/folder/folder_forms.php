<?php echo Message::show(); ?>
<!-- Bootstrap trigger to open modal -->
  <a href="#" data-toggle="modal" class="btn btn-primary" data-target=".pop-up-folder"><?= $data['button'] ?></a>
      <!--  Modal content for the image -->
      <div class="modal fade pop-up-folder" id="rating-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel-1" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">

              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h2 style="color:black;"><?= $data['header']?></h2>
              </div>
              <div class="modal-body">
                <form  id="myForm" class="form-horizontal well" data-async data-target="#rating-modal" action="<?= DIR ?>folder/createFolder" method="POST">
                    <div class="modal-body">
                      <ul class="nav nav-list">
                        <li class="nav-header" style="color:black;"><?= $data['format']?></li>
                          <li><input type="text" id="roundTimeExample" name="folder_name"></li>
                          <script type="text/javascript">
                          $('#roundTimeExample').timepicker({ 'forceRoundTime': true, 'step': 60,'timeFormat': 'H' });
                          </script>
                        <input type="hidden" name="depth" value="<?= $data['depth']?>">
                        <input type="hidden" name="infolder" value="<?= $data['fid']?>">
                      </ul>
                    </div>
                </form>
              </div>
              <div class="modal-footer">
                  <button class="btn btn-warning" data-dismiss="modal" aria-hidden="true">Cancel</button>
                  <button onclick="myFunction()" class="btn btn-primary" type="submit">Save</button>

                <script>
                    function myFunction() {
                        document.getElementById("myForm").submit();
                        document.getElementById("folder_name").submit();
                    }
                </script>
              </div>
            </div><!-- /.modal-content -->
           </div><!-- /.modal-dialog -->
          </div><!-- /.modal image -->
        </div>