<a href="<?= DIR?>folder/lists" type="button"  class="btn btn-primary">File Konfiguration</a>
<div class="row list-group products">
  <hr>
  <!--<a href="<?= DIR?>ga/sort" type="button"  class="btn btn-primary">Sort by</a>-->
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
                          '<p>Summe of Unique IpAddress : '.$data['ip'].'</p>
                          <p>Summe of Unique Users : '.$data['user'].'</p>';
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
                       <div class="panel-heading">Top 10 hits IpAddress</div>
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