<?php 

class Kv extends Controller {

   public function __construct() {
      parent::__construct();
   }

   public function index() {
      $data['title'] = 'KV';
      $data['sum'] = $this->_model->sum();

      $this->_view->render('header', $data);
      $this->_view->render('kv/list', $data);
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
            'char(49)'=> array('code'=>'a49', 'size'=>''),
            'char(50)'=> array('code'=>'a50', 'size'=>''),
            'char(150)'=> array('code'=>'a150', 'size'=>''),
            'char(200)'=> array('code'=>'a200', 'size'=>''),
            'char(1000)'=> array('code'=>'a1000', 'size'=>''),
            'varchar(1000)'=> array('code'=>'a999', 'size'=>''),
            );
      
            $codeKV2 = array(
                  array('name'=>'VersionId', 'type'=>'tinyint', 'size'=>'', 'code'=>'', 'accumulatedPointer'=>'0'),
                  array('name'=>'RecordSize', 'type'=>'smallint', 'size'=>'', 'code'=>'', 'accumulatedPointer'=>''),
                  array('name'=>'SequenceId', 'type'=>'unsignedint', 'size'=>'', 'code'=>'', 'accumulatedPointer'=>''),
                  array('name'=>'PlcNetworkId', 'type'=>'smallint', 'size'=>'', 'code'=>'', 'accumulatedPointer'=>''),
                  array('name'=>'PlcSubNetworkId', 'type'=>'tinyint', 'size'=>'', 'code'=>'', 'accumulatedPointer'=>''),
                  array('name'=>'WebsiteId', 'type'=>'int', 'size'=>'', 'code'=>'', 'accumulatedPointer'=>''), // 5
                  array('name'=>'PlacementId', 'type'=>'int', 'size'=>'', 'code'=>'', 'accumulatedPointer'=>''),
                  array('name'=>'CmgnNetworkId', 'type'=>'smallint', 'size'=>'', 'code'=>'', 'accumulatedPointer'=>''),
                  array('name'=>'CmgnSubNetworkId', 'type'=>'tinyint', 'size'=>'', 'code'=>'', 'accumulatedPointer'=>''),
                  array('name'=>'CampaignId', 'type'=>'int', 'size'=>'', 'code'=>'', 'accumulatedPointer'=>''),
                  array('name'=>'ExtensionType', 'type'=>'tinyint', 'size'=>'', 'code'=>'', 'accumulatedPointer'=>''), //10
                  array('name'=>'PhraseId', 'type'=>'int', 'size'=>'', 'code'=>'', 'accumulatedPointer'=>''),
                  array('name'=>'NoKeywordEntries', 'type'=>'smallint', 'size'=>'', 'code'=>'', 'accumulatedPointer'=>''), //12
                  
                );
        
            $codeKV2V2 = array(
                  array('name'=>'KeyId1', 'type'=>'int', 'size'=>'', 'code'=>''),
                  array('name'=>'ExpressionId1', 'type'=>'int', 'size'=>'', 'code'=>''),
                  array('name'=>'ValueString1', 'type'=>'char(49)', 'size'=>'', 'code'=>'') 
                );
            

            $code   = $codeKV2;
            $codeV2 = $codeKV2V2;
            
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
            
            foreach($codeV2 AS $k=>$v) {
              $codeV2[$k]['size'] = $dataTypesSize[$codeV2[$k]['type']]['size'];
              $codeV2[$k]['code'] = $dataTypesSize[$codeV2[$k]['type']]['code'];  
            };
            

            /*
              size/length row
            */
            $rowLength    = count($code);
            $rowLengthV2  = count($codeKV2V2);
            $rowSize = 0;
            foreach($code AS $k=>$v) {    
              $rowSize += $code[$k]['size'];  
            };
        
              foreach ($data['bin'] as $bin) {
                  if (substr($bin['filetitle'], -4) == '.bin') {
                       $filename=$bin['filedir'].$bin['filetitle'];
                       $handle = fopen($filename, 'rb');
                      
                      while ($contents = fread($handle, $rowSize)) {
                        $tmpObject = array();
                        $morekeyvalue   = 0;
                        $recordsize   = 0;
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
                            $data = substr(bcsub($data*-1, 4294967296), 1);     
                          };
                          if ($code[$i]['name'] == 'NoKeywordEntries') {
                            $morekeyvalue = $data;
                          };
                          if ($code[$i]['name'] == 'RecordSize') {
                            $recordsize = $data;
                          };
                          $tmpObject[$i] = $data; 
                        };      
                        if ($recordsize > $rowSize) {     
                          $record = $recordsize-$rowSize;     
                          $tmpObject[16] = array();
                          $tmpObject[17] = array();
                          $tmpObject[18] = array();   
                          $recordPointer = 0;
                          $contents = fread($handle, $record);        
                          for ($i=0; $i<$morekeyvalue; $i++) {
                            for ($iV2=0; $iV2<$rowLengthV2; $iV2++) {         
                              $codeCode = $codeV2[$iV2]['code'];
                              $codeSize = $codeV2[$iV2]['size']; 
                              if ($iV2 == 2) {                      
                                if ($codeSize>$record-$recordPointer) {
                                  $codeCode = 'a'.($record-$recordPointer);
                                  $codeSize = $record-$recordPointer;
                                };            
                              };          
                              $data = unpack($codeCode, substr($contents, $recordPointer, $codeSize));  
                              $recordPointer += $codeSize;
                              $data = $data[1];         
                              if ($codeV2[$iV2]['name'] == 'KeyId1') {
                                array_push($tmpObject[16], $data);
                              } elseif ($codeV2[$iV2]['name'] == 'ExpressionId1') {
                                array_push($tmpObject[17], $data);
                              } elseif ($codeV2[$iV2]['name'] == 'ValueString1') {
                                array_push($tmpObject[18], $data);
                              };
                            };
                          };
                        };    
                        $datas['VersionId'] = $tmpObject[0];
                        $datas['RecordSize'] = $tmpObject[1];
                        $datas['SequenceId'] = $tmpObject[2];
                        $datas['PlcNetworkId'] = $tmpObject[3];
                        $datas['PlcSubNetworkId'] = $tmpObject[4];
                        $datas['WebsiteId'] =$tmpObject[5];
                        $datas['PlacementId'] =$tmpObject[6];
                        $datas['CmgnNetworkId'] =$tmpObject[7];
                        $datas['CmgnSubNetworkId'] =$tmpObject[8];
                        $datas['CampaignId'] =$tmpObject[9];
                        $datas['ExtensionType'] =$tmpObject[10];
                        $datas['PhraseId'] =$tmpObject[11];
                        $datas['NoKeywordEntries'] =$tmpObject[12];                      
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
            'char(49)'=> array('code'=>'a49', 'size'=>''),
            'char(50)'=> array('code'=>'a50', 'size'=>''),
            'char(150)'=> array('code'=>'a150', 'size'=>''),
            'char(200)'=> array('code'=>'a200', 'size'=>''),
            'char(1000)'=> array('code'=>'a1000', 'size'=>''),
            'varchar(1000)'=> array('code'=>'a999', 'size'=>''),
            );
      
            $codeKV2 = array(
                  array('name'=>'VersionId', 'type'=>'tinyint', 'size'=>'', 'code'=>'', 'accumulatedPointer'=>'0'),
                  array('name'=>'RecordSize', 'type'=>'smallint', 'size'=>'', 'code'=>'', 'accumulatedPointer'=>''),
                  array('name'=>'SequenceId', 'type'=>'unsignedint', 'size'=>'', 'code'=>'', 'accumulatedPointer'=>''),
                  array('name'=>'PlcNetworkId', 'type'=>'smallint', 'size'=>'', 'code'=>'', 'accumulatedPointer'=>''),
                  array('name'=>'PlcSubNetworkId', 'type'=>'tinyint', 'size'=>'', 'code'=>'', 'accumulatedPointer'=>''),
                  array('name'=>'WebsiteId', 'type'=>'int', 'size'=>'', 'code'=>'', 'accumulatedPointer'=>''), // 5
                  array('name'=>'PlacementId', 'type'=>'int', 'size'=>'', 'code'=>'', 'accumulatedPointer'=>''),
                  array('name'=>'CmgnNetworkId', 'type'=>'smallint', 'size'=>'', 'code'=>'', 'accumulatedPointer'=>''),
                  array('name'=>'CmgnSubNetworkId', 'type'=>'tinyint', 'size'=>'', 'code'=>'', 'accumulatedPointer'=>''),
                  array('name'=>'CampaignId', 'type'=>'int', 'size'=>'', 'code'=>'', 'accumulatedPointer'=>''),
                  array('name'=>'ExtensionType', 'type'=>'tinyint', 'size'=>'', 'code'=>'', 'accumulatedPointer'=>''), //10
                  array('name'=>'PhraseId', 'type'=>'int', 'size'=>'', 'code'=>'', 'accumulatedPointer'=>''),
                  array('name'=>'NoKeywordEntries', 'type'=>'smallint', 'size'=>'', 'code'=>'', 'accumulatedPointer'=>''), //12
                  
                );
            
            $codeKV2V2 = array(
                  array('name'=>'KeyId1', 'type'=>'int', 'size'=>'', 'code'=>''),
                  array('name'=>'ExpressionId1', 'type'=>'int', 'size'=>'', 'code'=>''),
                  array('name'=>'ValueString1', 'type'=>'char(49)', 'size'=>'', 'code'=>'') 
                );
            

            $code   = $codeKV2;
            $codeV2 = $codeKV2V2;
            
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
            
            foreach($codeV2 AS $k=>$v) {
              $codeV2[$k]['size'] = $dataTypesSize[$codeV2[$k]['type']]['size'];
              $codeV2[$k]['code'] = $dataTypesSize[$codeV2[$k]['type']]['code'];  
            };
            

            /*
              size/length row
            */
            $rowLength    = count($code);
            $rowLengthV2  = count($codeKV2V2);
            $rowSize = 0;
            foreach($code AS $k=>$v) {    
              $rowSize += $code[$k]['size'];  
            };
              foreach ($data['bin'] as $bin) {
                  if (substr($bin['filetitle'], -4) == '.bin') {
                       $filename=$bin['filedir'].$bin['filetitle'];
                       $datax['filetitle'] = str_replace('.bin', '.bin.done', $bin['filetitle']);
                       $datax['id'] = $bin['id'];
                       $this->_model->update($datax);
                       $handle = fopen($filename, 'rb');
                        while ($contents = fread($handle, $rowSize)) {
                          $tmpObject = array();
                          $morekeyvalue   = 0;
                          $recordsize   = 0;
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
                            $data = substr(bcsub($data*-1, 4294967296), 1);     
                          };
                          if ($code[$i]['name'] == 'NoKeywordEntries') {
                            $morekeyvalue = $data;
                          };
                          if ($code[$i]['name'] == 'RecordSize') {
                            $recordsize = $data;
                          };
                          $tmpObject[$i] = $data; 
                        };      
                        if ($recordsize > $rowSize) {     
                          $record = $recordsize-$rowSize;     
                          $tmpObject[16] = array();
                          $tmpObject[17] = array();
                          $tmpObject[18] = array();   
                          $recordPointer = 0;
                          $contents = fread($handle, $record);        
                          for ($i=0; $i<$morekeyvalue; $i++) {
                            for ($iV2=0; $iV2<$rowLengthV2; $iV2++) {         
                              $codeCode = $codeV2[$iV2]['code'];
                              $codeSize = $codeV2[$iV2]['size']; 
                              if ($iV2 == 2) {                      
                                if ($codeSize>$record-$recordPointer) {
                                  $codeCode = 'a'.($record-$recordPointer);
                                  $codeSize = $record-$recordPointer;
                                };            
                              };          
                              $data = unpack($codeCode, substr($contents, $recordPointer, $codeSize));  
                              $recordPointer += $codeSize;
                              $data = $data[1];         
                              if ($codeV2[$iV2]['name'] == 'KeyId1') {
                                array_push($tmpObject[16], $data);
                              } elseif ($codeV2[$iV2]['name'] == 'ExpressionId1') {
                                array_push($tmpObject[17], $data);
                              } elseif ($codeV2[$iV2]['name'] == 'ValueString1') {
                                array_push($tmpObject[18], $data);
                              };
                            };
                          };
                        };  
                        $datas['VersionId'] = $tmpObject[0];
                        $datas['RecordSize'] = $tmpObject[1];
                        $datas['SequenceId'] = $tmpObject[2];
                        $datas['PlcNetworkId'] = $tmpObject[3];
                        $datas['PlcSubNetworkId'] = $tmpObject[4];
                        $datas['WebsiteId'] =$tmpObject[5];
                        $datas['PlacementId'] =$tmpObject[6];
                        $datas['CmgnNetworkId'] =$tmpObject[7];
                        $datas['CmgnSubNetworkId'] =$tmpObject[8];
                        $datas['CampaignId'] =$tmpObject[9];
                        $datas['ExtensionType'] =$tmpObject[10];
                        $datas['PhraseId'] =$tmpObject[11];
                        $datas['NoKeywordEntries'] =$tmpObject[12];                      
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