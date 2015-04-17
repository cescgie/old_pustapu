<div class="row list-group products">

   <?php echo Message::show(); ?>

   <?php
      if (!sizeof($data['lists'])) {
         echo '<div class="alert alert-info">Derzeit gibt es keine Liste. <a href="' . DIR . 'products/add">Leg gleich welche an</a>!</div>';
      }
      else {
      echo '
        <!-- Default panel contents -->
           <div class="panel-heading">All ga lists</div>

           <!-- Table -->
           <table border="1px" class="table">
              <thead>
                  <tr>
                     <th >VersionId</th>
                     <th >SequenceId</th>
                     <th >PlcNetworkId</th>
                     <th >PlcSubNetworkId</th>
                     <th >WebseiteId</th>
                     <th >PlacementId</th>
                     <th >PageId</th>
                     <th >CmgnNetworkId</th>
                     <th >CampaignId</th>
                     <th >MasterCampaignId</th>
                     <th >BannerId</th>
                     <th >BannerNumber</th>
                     <th >PaymentId</th>
                     <th >StateId</th>
                     <th >AreaCodeId</th>
                     <th >IpAddress</th>
                     <th >UserId</th>
                     <th >OsId</th>
                     <th >TagType</th>
                     <th >BrowserId</th>
                     <th >BrowserLanguage</th>
                     <th >TLDId</th>
                     <th >MediaTypeId</th>
                     <th >PlcContentTypeId</th>
                     <th >Reserved2</th>
                     <th >DateEntered</th>
                     <th >Hour</th>
                     <th >Minute</th>
                     <th >Second</th>
                     <th >AdServerIp</th>
                     <th >AdServerFarmId</th>
                     <th >DMAId</th>
                     <th >CountryId</th>
                     <th >ZipCodeId</th>
                     <th >CityId</th>
                     <th >IspId</th>
                     <th >CountTypeId</th>
                     <th >ConnectionTypeId</th>
                  </tr>
               </thead>
            <tbody id="mediaList" class="hp-optionsTable">';
         foreach ($data['lists'] as $list) {
            echo
               '<tr>
                     <td >'.$list['VersionId'].'</td>
                     <td >'.$list['SequenceId'].'</td>
                     <td >'.$list['PlcNetworkId'].'</td>
                     <td >'.$list['PlcSubNetworkId'].'</td>
                     <td >'.$list['WebseiteId'].'</td>
                     <td >'.$list['PlacementId'].'</td>
                     <td >'.$list['PageId'].'</td>
                     <td >'.$list['CmgnNetworkId'].'</td>
                     <td >'.$list['CampaignId'].'</td>
                     <td >'.$list['MasterCampaignId'].'</td>
                     <td >'.$list['BannerId'].'</td>
                     <td >'.$list['BannerNumber'].'</td>
                     <td >'.$list['PaymentId'].'</td>
                     <td >'.$list['StateId'].'</td>
                     <td >'.$list['AreaCodeId'].'</td>
                     <td >'.$list['IpAddress'].'</td>
                     <td >'.$list['UserId'].'</td>
                     <td >'.$list['OsId'].'</td>
                     <td >'.$list['TagType'].'</td>
                     <td >'.$list['BrowserId'].'</td>
                     <td >'.$list['BrowserLanguage'].'</td>
                     <td >'.$list['TLDId'].'</td>
                     <td >'.$list['MediaTypeId'].'</td>
                     <td >'.$list['PlcContentTypeId'].'</td>
                     <td >'.$list['Reserved2'].'</td>
                     <td >'.$list['DateEntered'].'</td>
                     <td >'.$list['Hour'].'</td>
                     <td >'.$list['Minute'].'</td>
                     <td >'.$list['Second'].'</td>
                     <td >'.$list['AdServerIp'].'</td>
                     <td >'.$list['AdServerFarmId'].'</td>
                     <td >'.$list['DMAId'].'</td>
                     <td >'.$list['CountryId'].'</td>
                     <td >'.$list['ZipCodeId'].'</td>
                     <td >'.$list['CityId'].'</td>
                     <td >'.$list['IspId'].'</td>
                     <td >'.$list['CountTypeId'].'</td>
                     <td >'.$list['ConnectionTypeId'].'</td>
               </tr>';
         }
         echo '
           </tbody>
         </table>';
      }
   ?>

</div> <!-- / .products -->