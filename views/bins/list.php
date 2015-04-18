<div class="row list-group products">


   <?php echo Message::show(); ?>

   <?php
   echo '<br><br>
   <div class="btn-group btn-group-justified" role="group" aria-label="...">
     <div class="btn-group" role="group">
       <a type="button" href="' .DIR.'bins/ga_analyze"  class="btn btn-default">GA</a>
     </div>
     <div class="btn-group" role="group">
       <a type="button" href="#" class="btn btn-default">Middle</a>
     </div>
     <div class="btn-group" role="group">
       <a type="button" href="#"  class="btn btn-default">Right</a>
     </div>
   </div>';
   ?>

   
   <?php
      /*if (!sizeof($data['bins'])) {
         echo '<div class="alert alert-info">Derzeit gibt es keine Bin-Datei.</div>';
      }
      else {
         echo 
            '<div class="panel panel-default">
              <!-- Default panel contents -->
               <div class="panel-heading">Panel heading</div>
                  <!-- Table -->
                  <table border="1px" class="table">
                     <thead>
                        <tr>
                          <th >Name</th>
                        </tr>
                    </thead>
                    <tbody id="mediaList" class="hp-optionsTable">';
         foreach ($data['bins'] as $bin) {
                  echo
                     '<tr>
                       <!-- <td >'.$bin['name'].'</td>-->
                     </tr>';
         }
                  echo 
                     '</tbody>
                </table>
            </div>';
      }*/
   ?>

</div> <!-- / .products -->