<?php 

class Ir extends Controller {

   public function __construct() {
      parent::__construct();
   }

   public function index() {
      $data['title'] = 'IR';
      $data['sum'] = $this->_model->sum();

      $this->_view->render('header', $data);
      $this->_view->render('ir/list', $data);
      $this->_view->render('footer');
   }
   public function parse($fid) {
        $id = (int)$fid;
        //echo $id;
        if ($id > 0) 
        {
          $data['bin'] = $this->_model->file_name($id);
          if ($data['bin'] != null) {
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
            'char(40)'=> array('code'=>'a40', 'size'=>''),
            'char(50)'=> array('code'=>'a50', 'size'=>''),
            'char(150)'=> array('code'=>'a150', 'size'=>''),
            'char(200)'=> array('code'=>'a200', 'size'=>''),
            'char(1000)'=> array('code'=>'a1000', 'size'=>''),
            'varchar(1000)'=> array('code'=>'a999', 'size'=>''),
        );
    
        $codeIR = array(
              array('name'=>'VersionId', 'type'=>'tinyint', 'size'=>'', 'code'=>'', 'accumulatedPointer'=>'0'),
              array('name'=>'NetworkId', 'type'=>'smallint', 'size'=>'', 'code'=>'', 'accumulatedPointer'=>''),
              array('name'=>'SubNetworkId', 'type'=>'tinyint', 'size'=>'', 'code'=>'', 'accumulatedPointer'=>''),
              array('name'=>'PlacementId', 'type'=>'int', 'size'=>'', 'code'=>'', 'accumulatedPointer'=>''),
              array('name'=>'CampaignId', 'type'=>'int', 'size'=>'', 'code'=>'', 'accumulatedPointer'=>''),
              array('name'=>'IpAddress', 'type'=>'unsignedint', 'size'=>'', 'code'=>'', 'accumulatedPointer'=>''),
              array('name'=>'UserId', 'type'=>'char(16)', 'size'=>'', 'code'=>'', 'accumulatedPointer'=>''),
              array('name'=>'OsId', 'type'=>'tinyint', 'size'=>'', 'code'=>'', 'accumulatedPointer'=>''),
              array('name'=>'BrowserId', 'type'=>'smallint', 'size'=>'', 'code'=>'', 'accumulatedPointer'=>''),
              array('name'=>'TagType', 'type'=>'smallint', 'size'=>'', 'code'=>'', 'accumulatedPointer'=>''),
              array('name'=>'RequestType', 'type'=>'tinyint', 'size'=>'', 'code'=>'', 'accumulatedPointer'=>''),
              array('name'=>'DateEntered', 'type'=>'int', 'size'=>'', 'code'=>'', 'accumulatedPointer'=>''),
              array('name'=>'Hour', 'type'=>'tinyint', 'size'=>'', 'code'=>'', 'accumulatedPointer'=>''),
              array('name'=>'Minute', 'type'=>'tinyint', 'size'=>'', 'code'=>'', 'accumulatedPointer'=>''),
              array('name'=>'Second', 'type'=>'tinyint', 'size'=>'', 'code'=>'', 'accumulatedPointer'=>''),
              array('name'=>'AdServerIp', 'type'=>'tinyint', 'size'=>'', 'code'=>'', 'accumulatedPointer'=>''),
              array('name'=>'AdServerFarmId', 'type'=>'tinyint', 'size'=>'', 'code'=>'', 'accumulatedPointer'=>''),
              array('name'=>'Url', 'type'=>'char(40)', 'size'=>'', 'code'=>'', 'accumulatedPointer'=>''),
              array('name'=>'Referer', 'type'=>'char(40)', 'size'=>'', 'code'=>'', 'accumulatedPointer'=>'')
            );
        $code = $codeIR;
        
        /*
          sizes of datatypes  
        */  
        foreach($dataTypesSize AS $k=>$v) {
          $dataTypesSize[$k]['size'] = strlen(pack($dataTypesSize[$k]['code'], ''));  
          
        };
        $rowPointer = 0;
        foreach($code AS $k=>$v) {
          $code[$k]['size'] = $dataTypesSize[$code[$k]['type']]['size'];
          $code[$k]['code'] = $dataTypesSize[$code[$k]['type']]['code'];  
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
              foreach ($data['bin'] as $bin) {
                  if (substr($bin['filetitle'], -4) == '.bin') {
                       $filename=$bin['filedir'].$bin['filetitle'];
                       $handle = fopen($filename, 'rb');
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
                              
                            } elseif ($data < 0) {        // AND $code[$i]['type'] == 'unsignedint'
                              if (!in_array($data, $errorcode))
                                $data = substr(bcsub($data*-1, 4294967296), 1);     
                            };
                            $tmpObject[$i] = $data;                       
                        }; 
                        $datas['VersionId'] = $tmpObject[0];
                        $datas['NetworkId'] = $tmpObject[1];
                        $datas['SubNetworkId'] = $tmpObject[2];
                        $datas['PlacementId'] =$tmpObject[3];
                        $datas['CampaignId'] =$tmpObject[4];
                        $datas['IpAddress'] =$tmpObject[5];
                        $datas['UserId'] =$tmpObject[6];
                        $datas['OsId'] =$tmpObject[7];                        
                        $datas['BrowserId'] =$tmpObject[8];
                        $datas['TagType'] =$tmpObject[9];
                        $datas['RequestType'] =$tmpObject[10];
                        $datas['DateEntered'] =$tmpObject[11];
                        $datas['Hour'] =$tmpObject[12];
                        $datas['Minute'] =$tmpObject[13];
                        $datas['Second'] =$tmpObject[14];
                        $datas['AdServerIp'] =$tmpObject[15];
                        $datas['AdServerFarmId'] =$tmpObject[16];
                        $datas['Url'] =$tmpObject[17];
                        $datas['Referer'] =$tmpObject[18];
                        $datas['in_bin'] = $bin['id'];
                        $this->_model->_insert($datas);
                     };
                      //rename bin folder in path uploads/ 
                      @fclose($handle);
                      @chmod($filename, 0666);
                      @rename($filename, $filename.'.done');

                      //update database
                      $datax['filetitle'] = str_replace('.bin', '.bin.done', $bin['filetitle']);
                      $datax['id'] = $id;
                      $this->_model->update($datax); 
                      Message::set('File '.$bin['filetitle'].' has been parsed');
                  };
                  $debugTimeEnd = microtime(true); 
               }               
             }else{
                 Message::set("File not found!");
             }
        }
     header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

   public function parse_all($fid) {
        $id = (int)$fid;
        if ($id > 0) 
        {
          $data['bin'] = $this->_model->file_name2($id);
          if ($data['bin'] != null) {
              
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
            'char(40)'=> array('code'=>'a40', 'size'=>''),
            'char(50)'=> array('code'=>'a50', 'size'=>''),
            'char(150)'=> array('code'=>'a150', 'size'=>''),
            'char(200)'=> array('code'=>'a200', 'size'=>''),
            'char(1000)'=> array('code'=>'a1000', 'size'=>''),
            'varchar(1000)'=> array('code'=>'a999', 'size'=>''),
        );
    
        $codeIR = array(
              array('name'=>'VersionId', 'type'=>'tinyint', 'size'=>'', 'code'=>'', 'accumulatedPointer'=>'0'),
              array('name'=>'NetworkId', 'type'=>'smallint', 'size'=>'', 'code'=>'', 'accumulatedPointer'=>''),
              array('name'=>'SubNetworkId', 'type'=>'tinyint', 'size'=>'', 'code'=>'', 'accumulatedPointer'=>''),
              array('name'=>'PlacementId', 'type'=>'int', 'size'=>'', 'code'=>'', 'accumulatedPointer'=>''),
              array('name'=>'CampaignId', 'type'=>'int', 'size'=>'', 'code'=>'', 'accumulatedPointer'=>''),
              array('name'=>'IpAddress', 'type'=>'unsignedint', 'size'=>'', 'code'=>'', 'accumulatedPointer'=>''),
              array('name'=>'UserId', 'type'=>'char(16)', 'size'=>'', 'code'=>'', 'accumulatedPointer'=>''),
              array('name'=>'OsId', 'type'=>'tinyint', 'size'=>'', 'code'=>'', 'accumulatedPointer'=>''),
              array('name'=>'BrowserId', 'type'=>'smallint', 'size'=>'', 'code'=>'', 'accumulatedPointer'=>''),
              array('name'=>'TagType', 'type'=>'smallint', 'size'=>'', 'code'=>'', 'accumulatedPointer'=>''),
              array('name'=>'RequestType', 'type'=>'tinyint', 'size'=>'', 'code'=>'', 'accumulatedPointer'=>''),
              array('name'=>'DateEntered', 'type'=>'int', 'size'=>'', 'code'=>'', 'accumulatedPointer'=>''),
              array('name'=>'Hour', 'type'=>'tinyint', 'size'=>'', 'code'=>'', 'accumulatedPointer'=>''),
              array('name'=>'Minute', 'type'=>'tinyint', 'size'=>'', 'code'=>'', 'accumulatedPointer'=>''),
              array('name'=>'Second', 'type'=>'tinyint', 'size'=>'', 'code'=>'', 'accumulatedPointer'=>''),
              array('name'=>'AdServerIp', 'type'=>'tinyint', 'size'=>'', 'code'=>'', 'accumulatedPointer'=>''),
              array('name'=>'AdServerFarmId', 'type'=>'tinyint', 'size'=>'', 'code'=>'', 'accumulatedPointer'=>''),
              array('name'=>'Url', 'type'=>'char(40)', 'size'=>'', 'code'=>'', 'accumulatedPointer'=>''),
              array('name'=>'Referer', 'type'=>'char(40)', 'size'=>'', 'code'=>'', 'accumulatedPointer'=>'')
            );
        $code = $codeIR;
        
        /*
          sizes of datatypes  
        */  
        foreach($dataTypesSize AS $k=>$v) {
          $dataTypesSize[$k]['size'] = strlen(pack($dataTypesSize[$k]['code'], ''));  
          
        };
        $rowPointer = 0;
        foreach($code AS $k=>$v) {
          $code[$k]['size'] = $dataTypesSize[$code[$k]['type']]['size'];
          $code[$k]['code'] = $dataTypesSize[$code[$k]['type']]['code'];  
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
              foreach ($data['bin'] as $bin) {
                  if (substr($bin['filetitle'], -4) == '.bin') {
                       $filename=$bin['filedir'].$bin['filetitle'];
                       $datax['filetitle'] = str_replace('.bin', '.bin.done', $bin['filetitle']);
                       $datax['id'] = $bin['id'];
                       $this->_model->update($datax);
                       $handle = fopen($filename, 'rb');
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
                              
                            } elseif ($data < 0) {        // AND $code[$i]['type'] == 'unsignedint'
                              if (!in_array($data, $errorcode))
                                $data = substr(bcsub($data*-1, 4294967296), 1);     
                            };
                            $tmpObject[$i] = $data;                        
                        }; 
                        $datas['VersionId'] = $tmpObject[0];
                        $datas['NetworkId'] = $tmpObject[1];
                        $datas['SubNetworkId'] = $tmpObject[2];
                        $datas['PlacementId'] =$tmpObject[3];
                        $datas['CampaignId'] =$tmpObject[4];
                        $datas['IpAddress'] =$tmpObject[5];
                        $datas['UserId'] =$tmpObject[6];
                        $datas['OsId'] =$tmpObject[7];                        
                        $datas['BrowserId'] =$tmpObject[8];
                        $datas['TagType'] =$tmpObject[9];
                        $datas['RequestType'] =$tmpObject[10];
                        $datas['DateEntered'] =$tmpObject[11];
                        $datas['Hour'] =$tmpObject[12];
                        $datas['Minute'] =$tmpObject[13];
                        $datas['Second'] =$tmpObject[14];
                        $datas['AdServerIp'] =$tmpObject[15];
                        $datas['AdServerFarmId'] =$tmpObject[16];
                        $datas['Url'] =$tmpObject[17];
                        $datas['Referer'] =$tmpObject[18];
                        $datas['in_bin'] = $bin['id'];

                        $this->_model->_insert($datas);
                     };
                      //rename bin folder in path uploads/ 
                      @fclose($handle);
                      @chmod($filename, 0666);
                      @rename($filename, $filename.'.done');
                  };
                  $debugTimeEnd = microtime(true); 
               }  
                 Message::set("All files have been parsed");            
             }else{
                 Message::set("File not found!");
             }
        }
     header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}
?>