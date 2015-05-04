<a href="<?= DIR?>folder/lists" type="button"  class="btn btn-primary">File Konfiguration</a>
<div class="row list-group products">
  <hr>
   <?php echo Message::show(); ?>
    <br>
     <?php
              if (!sizeof($data['sum'])) {
                 echo '<div class="alert alert-info">No Data.</div>';
              }
              else{
                echo
                '<div class="panel panel-default">
                      <!-- Default panel contents -->
                       <div class="panel-heading">CF</div>';
                        foreach ($data['sum'] as $sum){
                          echo '<p>Summe of all Data : '.$sum['Summe'].'</p>';
                        }
                echo
                      '</div> <!-- panel-heading -->
                </div> <!-- panel panel-default -->';
                
              }
           ?>