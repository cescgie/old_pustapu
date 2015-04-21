<div class="row list-group products">

   <?php echo Message::show(); ?>
   <div class="btn-group btn-group-justified" role="group" aria-label="...">
     <div class="btn-group" role="group">
       <a type="button" href="<?= DIR?>folder/lists"  class="btn btn-default">Bin File</a>
     </div>
     <div class="btn-group" role="group">
       <a type="button" href="<?= DIR?>ga/list"  class="btn btn-default">Analize</a>
     </div>
     <!--<div class="btn-group" role="group">
       <a type="button" href="#"  class="btn btn-default">Right</a>
     </div>-->
   </div>
   <br><br>
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
                          echo '<p>Summe all of data : '.$sum['Summe'].'</p>';
                        }
                        //foreach ($data['ip'] as $ip){
                          echo '<p>Summe all Ip Address : '.$data['ip'].'</p>';
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