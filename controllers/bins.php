<?php

class Bins extends Controller {

   public function __construct() {
      parent::__construct();
   }

   public function index() {
      $data['title'] = 'Übersicht';
      $data['bins'] = $this->_model->all();
      echo $data['fid'];

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

   public function bin_folder(){
      $data['title'] = 'File bin';

      $this->_view->render('header', $data);
      $this->_view->render('bins/list', $data);
      $this->_view->render('bins/folder', $data);
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

   public function tar_convert($id){
      $id = (int)$id;
      $data['title'] = 'Convert';
      if ($id > 0){
         $data['bin'] = $this->_model->file_bin($id);
         foreach ($data['bin'] as $fbin){
               //This input should be from somewhere else, hard-coded in this example
               $file_name = $fbin['filedir'].$fbin['filetitle'];
               // Raising this value may increase performance
               $buffer_size = 4096; // read 4kb at a time
               $out_file_name = str_replace('.gz', '', $file_name); 
               // Open our files (in binary mode)
               $file = gzopen($file_name, 'rb');
               $out_file = fopen($out_file_name, 'wb'); 
               // Keep repeating until the end of the input file
               while(!gzeof($file)) {
               // Read buffer-size bytes
               // Both fwrite and gzread and binary-safe
                 fwrite($out_file, gzread($file, $buffer_size));
               } 
               // Files are done, close files
               fclose($out_file);
               gzclose($file);
               echo $out_file;
               
         }
         //update database
         $datas['filetitle'] = str_replace('.gz', '', $fbin['filetitle']);
         $datas['id'] = $id;
         $this->_model->update($datas); 

         //erase gz
         $filename=$fbin['filedir'].$fbin['filetitle'];
         unlink($filename);
         Message::set('File '.$fbin['filetitle'].' converted');
      }
    header('Location: ' . $_SERVER['HTTP_REFERER']);
   }

    public function convert_all($id) {
        $id = (int)$id;
        //echo $id;
        if ($id > 0) 
        {          
          $data['bin'] = $this->_model->file_sel($id);
          if ($data['bin'] != null) {
             foreach ($data['bin'] as &$fbin) {
                  //This input should be from somewhere else, hard-coded in this example
                   $file_name = $fbin['filedir'].$fbin['filetitle'];
                   // Raising this value may increase performance
                   $buffer_size = 4096; // read 4kb at a time
                   $out_file_name = str_replace('.gz', '', $file_name); 
                   // Open our files (in binary mode)
                   $file = gzopen($file_name, 'rb');
                   $out_file = fopen($out_file_name, 'wb'); 
                   // Keep repeating until the end of the input file
                   while(!gzeof($file)) {
                   // Read buffer-size bytes
                   // Both fwrite and gzread and binary-safe
                     fwrite($out_file, gzread($file, $buffer_size));
                   } 
                   // Files are done, close files
                   fclose($out_file);
                   gzclose($file);
                   echo $out_file;                  

                   //update database
                   $datas['filetitle'] = str_replace('.gz', '', $fbin['filetitle']);
                   $datas['id']= $fbin['id'];
                   $this->_model->update($datas); 
                  
                   //erase .gz from path upload\
                   if (substr($fbin['filetitle'], -7) == '.bin.gz'){
                     $filename=$fbin['filedir'].$fbin['filetitle'];
                     unlink($filename);
                   }
                   Message::set('All files have been converted');
                }             
           }else{
               Message::set("File not found!");
           }
        }
        header('Location: ' . $_SERVER['HTTP_REFERER']);
   }

    public function uploads($fid) {
       $id = (int)$fid;
        if ($id > 0) 
        {
         if (!empty($_FILES)) {
            $tempFile = $_FILES['file']['tmp_name'];
            $data['infolderid'] = $id;
            $data['filetitle'] =$_FILES['file']['name'];
            $data['filedir'] = getcwd()."/uploads/";
            $data['filesize'] = $_FILES["file"]["size"];
            $targetFile = $data['filedir']. $data['filetitle'];
            move_uploaded_file($tempFile, $targetFile);
            $this->_model->insert($data);
            $data['title'] = "Upload";
               Message::set("Upload succesfull");
            } else{
               Message::set("Upload failed. Please select a file to upload");
            }
         }
        header("Refresh:0; url='../../gallery'");
    }

    public function delete($id) {
        $id = (int)$id;
        //echo $id;
        if ($id > 0) 
        {
          $data['bin'] = $this->_model->single($id);
          if ($data['bin'] != null) {
             $file_name = $this->_model->file_bin($id);
             foreach ($file_name as &$bin) {
                  $filename=$bin['filedir'].$bin['filetitle'];
                  //delete from folder uploads
                  unlink($filename);  
                  //delete bin in database               
                  $this->_model->delete($id);

                 Message::set("File ".$bin['filetitle']." deleted");
               }
           }else{
               Message::set("File not found!");
           }
        }
        header('Location: ' . $_SERVER['HTTP_REFERER']);
   }

   public function delete_db($id) {
        $id = (int)$id;
        //echo $id;
        if ($id > 0) 
        {
          $file_name = $this->_model->file_name($id);
          if ($file_name != null) {
            //delete records from database
            $this->_model->delete_records($id);
            foreach ($file_name as &$bin) {
                  //update bin file in database
                  $datax['filetitle'] = str_replace('.bin.done', '.bin', $bin['filetitle']);
                  $datax['id'] = $bin['id'];
                  $this->_model->update($datax);
                  
                  //update bin file in folder uploads
                  $filename=$bin['filedir'].$bin['filetitle']; 
                  chmod($filename, 0666);
                  $newname = str_replace(".bin.done", ".bin", $filename);
                  rename($filename, $newname); 

                 Message::set("Records in database deleted");
               }
           }else{
               Message::set("Records not found!");
           }
        }
        header('Location: ' . $_SERVER['HTTP_REFERER']);
   }

   public function delete_all($id) {
        $id = (int)$id;
        //echo $id;
        if ($id > 0) 
        {
          $data['bin'] = $this->_model->file_name2($id);
          if ($data['bin'] != null) {
             foreach ($data['bin'] as $bin) {
                  $filename=$bin['filedir'].$bin['filetitle'];
                  unlink($filename);
                  $this->_model->delete_sel($id);                 
                  Message::set("File(s) deleted");
               }               
           }else{
               Message::set("File not found!");
           }
        }
        header('Location: ' . $_SERVER['HTTP_REFERER']);
   }
}