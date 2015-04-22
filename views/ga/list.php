<a href="<?= DIR?>folder/lists" type="button"  class="btn btn-primary">File Konfiguration</a>

<div class="row list-group products">
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
                       <div class="panel-heading">GA (Impression) </div>';
                        foreach ($data['sum'] as $sum){
                          echo '<p>Summe of all Data : '.$sum['Summe'].'</p>';
                        }
                        //foreach ($data['ip'] as $ip){
                          echo 
                          '<p>Summe of all IpAddress : '.$data['ip'].'</p>
                          <p>Summe of all Users : '.$data['user'].'</p>';
                echo
                      '</div> <!-- panel-heading -->
                </div> <!-- panel panel-default -->';
                
              }
           ?>
          <?php
              if (!sizeof($data['count'])) {
                 echo '<div class="alert alert-info">No Data.</div>';
              }
              else {
                 echo 
                    '<div class="panel panel-default">
                      <!-- Default panel contents -->
                       <div class="panel-heading">IpAddress with > 100 hits </div>
                          <!-- Table -->
                          <table border="1px" class="table">
                             <thead>
                                <tr>
                                  <th >IpAddress</th>
                                  <th >Summe</th>
                                </tr>
                            </thead>
                            <tbody id="mediaList" class="hp-optionsTable">';
                 foreach ($data['count'] as $count) {
                          echo
                             '<tr>
                                <td>'.$count['IpAddress'].'</td>
                                <td>'.$count['Summe'].'</td>
                             </tr>';
                 }
                          echo 
                             '</tbody>
                        </table>
                    </div>';
              }
           ?>

   
</div> <!-- / .products -->