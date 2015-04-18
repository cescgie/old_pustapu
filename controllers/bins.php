<?php

class Bins extends Controller {

   public function __construct() {
      parent::__construct();
   }

   public function index() {
      $data['title'] = 'Übersicht';
      //$data['bins'] = $this->_model->all();

      $this->_view->render('header', $data);
      $this->_view->render('bins/list', $data);
      $this->_view->render('footer');
   }

   public function add() {
      $data['title'] = 'Neues Produkt';
      $data['form_header'] = 'Neues Produkt anlegen';

      $this->_view->render('header', $data);
      $this->_view->render('lists/form', $data);
      $this->_view->render('footer');
   }

   public function ga_analyze(){
      $data['title'] = 'analyze';
      //$data['form_header'] = 'Neues Produkt anlegen';
      $data['count'] = $this->_model->count();

      $this->_view->render('header', $data);
      $this->_view->render('bins/list', $data);
      $this->_view->render('bins/ga_list', $data);
      $this->_view->render('footer');
   }
   public function ga_upload() {
      if(!isset($_POST['upfile'])){   
         Message::set("Upload failed");
        }else{         
            move_uploaded_file($_FILES["uploaded"]["tmp_name"],'uploads/'.$_FILES['uploaded']['name']);
            //Message::set("Upload succesfull");
            ini_set('max_execution_time', 68000); 
            @set_time_limit(68000);

            $debugTimeStart = microtime(true);  

            $dataTypesSize = array(
                     'tinyint'=> array('code'=>'C', 'size'=>''),
                     'smallint'=> array( 'code'=>'n', 'size'=>''),
                     'int'=> array('code'=>'N', 'size'=>''),
                     'unsignedint'=> array('code'=>'N', 'size'=>''),
                     'char(16)'=> array('code'=>'a16', 'size'=>''),
                     'char(32)'=> array('code'=>'a32', 'size'=>''),
                     'char(50)'=> array('code'=>'a50', 'size'=>''),
                     'char(150)'=> array('code'=>'a150', 'size'=>''),
                     'char(200)'=> array('code'=>'a200', 'size'=>''),
                     'char(1000)'=> array('code'=>'a1000', 'size'=>''),
                     'varchar(1000)'=> array('code'=>'a999', 'size'=>''),
               );
            $codeGA = array(
            array('name'=>'VersionId', 'type'=>'tinyint', 'size'=>'', 'code'=>'', 'accumulatedPointer'=>'0'),
            array('name'=>'SequenceId', 'type'=>'unsignedint', 'size'=>'', 'code'=>'', 'accumulatedPointer'=>''),
            array('name'=>'PlcNetworkId', 'type'=>'smallint', 'size'=>'', 'code'=>'', 'accumulatedPointer'=>''),
            array('name'=>'PlcSubNetworkId', 'type'=>'tinyint', 'size'=>'', 'code'=>'', 'accumulatedPointer'=>''),
            array('name'=>'WebsiteId', 'type'=>'int', 'size'=>'', 'code'=>'', 'accumulatedPointer'=>''),
            array('name'=>'PlacementId', 'type'=>'int', 'size'=>'', 'code'=>'', 'accumulatedPointer'=>''),
            array('name'=>'PageId', 'type'=>'int', 'size'=>'', 'code'=>'', 'accumulatedPointer'=>''),
            array('name'=>'CmgnNetworkId', 'type'=>'smallint', 'size'=>'', 'code'=>'', 'accumulatedPointer'=>''),
            array('name'=>'CmgnSubNetworkId', 'type'=>'tinyint', 'size'=>'', 'code'=>'', 'accumulatedPointer'=>''),
            array('name'=>'CampaignId', 'type'=>'int', 'size'=>'', 'code'=>'', 'accumulatedPointer'=>''),
            array('name'=>'MasterCampaignId', 'type'=>'int', 'size'=>'', 'code'=>'', 'accumulatedPointer'=>''),
            array('name'=>'BannerId', 'type'=>'smallint', 'size'=>'', 'code'=>'', 'accumulatedPointer'=>''),
            array('name'=>'BannerNumber', 'type'=>'int', 'size'=>'', 'code'=>'', 'accumulatedPointer'=>''),
            array('name'=>'PaymentId', 'type'=>'tinyint', 'size'=>'', 'code'=>'', 'accumulatedPointer'=>''),
            array('name'=>'StateId', 'type'=>'smallint', 'size'=>'', 'code'=>'', 'accumulatedPointer'=>''),
            array('name'=>'AreaCodeId', 'type'=>'smallint', 'size'=>'', 'code'=>'', 'accumulatedPointer'=>''),
            array('name'=>'IpAddress', 'type'=>'unsignedint', 'size'=>'', 'code'=>'', 'accumulatedPointer'=>''),
            array('name'=>'UserId', 'type'=>'char(16)', 'size'=>'', 'code'=>'', 'accumulatedPointer'=>''),
            array('name'=>'OsId', 'type'=>'tinyint', 'size'=>'', 'code'=>'', 'accumulatedPointer'=>''),
            array('name'=>'TagType', 'type'=>'tinyint', 'size'=>'', 'code'=>'', 'accumulatedPointer'=>''),
            array('name'=>'BrowserId', 'type'=>'tinyint', 'size'=>'', 'code'=>'', 'accumulatedPointer'=>''),
            array('name'=>'BrowserLanguage', 'type'=>'tinyint', 'size'=>'', 'code'=>'', 'accumulatedPointer'=>''),
            array('name'=>'TLDId', 'type'=>'smallint', 'size'=>'', 'code'=>'', 'accumulatedPointer'=>''),
            array('name'=>'MediaTypeId', 'type'=>'tinyint', 'size'=>'', 'code'=>'', 'accumulatedPointer'=>''),
            array('name'=>'PlcContentTypeId', 'type'=>'tinyint', 'size'=>'', 'code'=>'', 'accumulatedPointer'=>''),
            array('name'=>'Reserved2', 'type'=>'smallint', 'size'=>'', 'code'=>'', 'accumulatedPointer'=>''),
            array('name'=>'DateEntered', 'type'=>'int', 'size'=>'', 'code'=>'', 'accumulatedPointer'=>''),
            array('name'=>'Hour', 'type'=>'tinyint', 'size'=>'', 'code'=>'', 'accumulatedPointer'=>''),
            array('name'=>'Minute', 'type'=>'tinyint', 'size'=>'', 'code'=>'', 'accumulatedPointer'=>''),
            array('name'=>'Second', 'type'=>'tinyint', 'size'=>'', 'code'=>'', 'accumulatedPointer'=>''),
            array('name'=>'AdServerIp', 'type'=>'tinyint', 'size'=>'', 'code'=>'', 'accumulatedPointer'=>''),
            array('name'=>'AdServerFarmId', 'type'=>'tinyint', 'size'=>'', 'code'=>'', 'accumulatedPointer'=>''),
            array('name'=>'DMAId', 'type'=>'tinyint', 'size'=>'', 'code'=>'', 'accumulatedPointer'=>''),
            array('name'=>'CountryId', 'type'=>'smallint', 'size'=>'', 'code'=>'', 'accumulatedPointer'=>''),
            array('name'=>'ZipCodeId', 'type'=>'int', 'size'=>'', 'code'=>'', 'accumulatedPointer'=>''),
            array('name'=>'CityId', 'type'=>'int', 'size'=>'', 'code'=>'', 'accumulatedPointer'=>''),
            array('name'=>'IspId', 'type'=>'smallint', 'size'=>'', 'code'=>'', 'accumulatedPointer'=>''),
            array('name'=>'CountTypeId', 'type'=>'tinyint', 'size'=>'', 'code'=>'', 'accumulatedPointer'=>''),
            array('name'=>'ConnectionTypeId', 'type'=>'tinyint', 'size'=>'', 'code'=>'', 'accumulatedPointer'=>'')
                  );
            $code = $codeGA;
            //$code = $codeBPC;
            
            /*
               sizes of datatypes   
            */ 
            foreach($dataTypesSize AS $k=>$v) {
               $dataTypesSize[$k]['size'] = strlen(pack($dataTypesSize[$k]['code'], '')); 
               
            };
            $rowPointer = 0;
            foreach($code AS $k=>$v) {
               $code[$k]['size'] = $dataTypesSize[$code[$k]['type']]['size'];
               $code[$k]['code'] =  $dataTypesSize[$code[$k]['type']]['code'];   
               $code[$k]['accumulatedPointer'] = $rowPointer;
               $rowPointer += $code[$k]['size'];         
            };
   
            /*
               size/length row
            */
            $rowLength = count($code);
            $rowSize = 0;
            foreach($code AS $k=>$v) {
               $rowSize += $code[$k]['size'];
            };
            
            
            /*
               errorcode
            */
            $errorcode = array('-2', '-3', '-4', '-6', '-7', '-10', '-23', '-26', '-98');
            $handlefolder = opendir ('uploads/');
               while ($file = readdir ($handlefolder)) {    
                  if (substr($file, -4) == '.bin') {
                     echo 'uploads/'.$file."\n";
                     $handle = fopen('uploads/'.$file, 'rb');
                     while ($contents = fread($handle, $rowSize)) {
                        $tmpObject = array();
                        for ($i=0; $i<$rowLength; $i++) {
                           
                           $data = unpack($code[$i]['code'], substr($contents, $code[$i]['accumulatedPointer'], $code[$i]['size']));         
                           $data = $data[1];
                           
                           if ($code[$i]['name'] == 'IpAddress') {
                              $data = (255 & ($data >> 24)).'.'.(255 & ($data >> 16)).'.'.(255 & $data>>8).'.'.(255 & $data);          
                           } elseif ($code[$i]['name'] == 'UserId') {
                              $user = '';
                              for ($ii=0; $ii<strlen($data); $ii++) {
                                 $userTmp = ord($data[$ii]);
                                 $user = $user.dechex ((15 & ($userTmp >> 4))).dechex (15 & $userTmp);
                              };
                              $data = $user;    
                              
                           } elseif ($data < 0) {           // AND $code[$i]['type'] == 'unsignedint'
                              if (!in_array($data, $errorcode))
                                 $data = substr(bcsub($data*-1, 4294967296), 1);       
                           };
                           $tmpObject[$i] = $data;       
                           
                        }; 
                        $datas['VersionId'] = $tmpObject[0];
                        $datas['SequenceId'] = $tmpObject[1];
                        $datas['PlcNetworkId'] = $tmpObject[2];
                        $datas['PlcSubNetworkId'] =$tmpObject[3];
                        $datas['WebsiteId'] =$tmpObject[4];
                        $datas['PlacementId'] =$tmpObject[5];
                        $datas['PageId'] =$tmpObject[6];
                        $datas['CmgnNetworkId'] =$tmpObject[7];
                        $datas['CmgnSubNetworkId'] =$tmpObject[8];
                        $datas['CampaignId'] =$tmpObject[9];
                        $datas['MasterCampaignId'] =$tmpObject[10];
                        $datas['BannerId'] =$tmpObject[11];
                        $datas['BannerNumber'] =$tmpObject[12];
                        $datas['PaymentId'] =$tmpObject[13];
                        $datas['StateId'] =$tmpObject[14];
                        $datas['AreaCodeId'] =$tmpObject[15];
                        $datas['IpAddress'] =$tmpObject[16];
                        $datas['UserId'] =$tmpObject[17];
                        $datas['OsId'] =$tmpObject[18];
                        $datas['TagType'] =$tmpObject[19];
                        $datas['BrowserId'] =$tmpObject[20];
                        $datas['BrowserLanguage'] =$tmpObject[21];
                        $datas['TLDId'] =$tmpObject[22];
                        $datas['MediaTypeId'] =$tmpObject[23];
                        $datas['PlcContentTypeId'] =$tmpObject[24];
                        $datas['Reserved2'] =$tmpObject[25];
                        $datas['DateEntered'] =$tmpObject[26];
                        $datas['Hour'] =$tmpObject[27];
                        $datas['Minute'] =$tmpObject[28];
                        $datas['Second'] =$tmpObject[29];
                        $datas['AdServerIp'] =$tmpObject[30];
                        $datas['AdServerFarmId'] =$tmpObject[31];
                        $datas['DMAId'] =$tmpObject[32];
                        $datas['CountryId'] =$tmpObject[33];
                        $datas['ZipCodeId'] =$tmpObject[34];
                        $datas['CityId'] =$tmpObject[35];
                        $datas['IspId'] =$tmpObject[36];
                        $datas['CountTypeId'] =$tmpObject[37];
                        $datas['ConnectionTypeId'] =$tmpObject[38];
                        //$datas['IpAddress'] = $tmpObject[16];
                        //echo $datas['AdServerFarmId'];
                        //echo $tmpObject[16];
                        $this->_model->ga_insert($datas);
                     };
               /*if($insert === FALSE) {
                   //echo "Insert Error: " . $connect->error. "\n";
               }else{         
                   echo "Document inserted successfully. \n";
               }*/
                  
               @fclose($handle);
               @chmod('uploads/'.$file, 0666);
               @rename('uploads/'.$file, 'uploads/'.$file.'.done');
            };
         };
         $debugTimeEnd = microtime(true); 
         //echo "\n\n".'runtime: '.($debugTimeEnd-$debugTimeStart).' s';
         //echo "\n";

        }
        header("Refresh:0; url='/pustapu/bins'");
    }

}