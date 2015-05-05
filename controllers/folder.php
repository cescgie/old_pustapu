<?php

class Folder extends Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		//data for view
		//strtoupper(Session::get('general'));
		$data['title'] =  strtoupper(Session::get('general'))."_Folder";
		$data['header'] = 'Create Year';
		$data['button'] = 'Create Year Folder';
		$data['format'] = 'Example : 2015';
		//database
      	$data['folder'] = $this->_model->all();
      	//view
      	$this->_view->render('header', $data);
	  	$this->_view->render('folder/folder_form',$data);
	  	$this->_view->render('folder/list_depth0',$data); 
	  	$this->_view->render('footer');
		
	}

	public function createFolder(){

	   		if(isset($_POST["folder_name"])){
	   			$data['name'] = $_POST["folder_name"];
	   			$data['depth'] = $_POST["depth"];
	   			$data['infolder'] = $_POST["infolder"];
	   			Message::set("Folder '".$data['name']."' created");
	   			$this->_model->insert($data);
	   		}else{
	   			Message::set("No information added");
	   		}
	     header('Location: ' . $_SERVER['HTTP_REFERER']);
   
	}

   public function depth1($id){
   		 $data['title'] = strtoupper(Session::get('general'))."_Folder";
   		 $data['header'] = 'Create Month';
   		 $data['button'] = 'Create Month Folder';
		 $data['format'] = 'Example : April';
   	 	 $id = (int)$id;
	     if ($id > 0) 
	     {
	     	 //echo $id;
	     	 $fid = $id; 	 
	     	 //$data['files'] = $this->_model->selectSingle($id);
	     	 $data['depth'] = 1;
	     	 $data['fid'] = $fid;
	     	 $this->_view->render('header', $data);
	     	 $this->_view->render('folder/folder_form',$data);
	     	 $data['fname'] = $this->_model->folder_name($fid);
	     	 foreach ($data['fname'] as $folder) {
	     	 	$fid1 = $folder['infolder'];   	 	
	     	 }
	     	 $data['fname1'] = $this->_model->folder_name1($fid1);
	     	 //echo $fid1;
	     	 foreach ($data['fname1'] as $folds) {
	     	 	$fid2 = $folds['infolder'];   	 	
	     	 }
	     	 //$data['fname2'] = $this->_model->folder_name1($fid2);
	     	 $data['folder'] = $this->_model->selectSingle($fid);	     	 
	     	 $this->_view->render('folder/list_depth1',$data); 
	  		 $this->_view->render('footer');
	     }
   }
    public function depth2($id){
   		 $data['title'] = strtoupper(Session::get('general'))."_Folder";
   		 $data['header'] = 'Create Date';
   		 $data['button'] = 'Create Date Folder';
		 $data['format'] = 'Example : 31';
   	 	 $id = (int)$id;
	     if ($id > 0) 
	     {
	     	//echo $id;
	     	 $fid = $id; 	 
	     	 //$data['files'] = $this->_model->selectSingle($id);
	     	 $data['depth'] = 2;
	     	 $data['fid'] = $fid;
	     	 $this->_view->render('header', $data);
	     	 $this->_view->render('folder/folder_form',$data);
	     	 $data['fname'] = $this->_model->folder_name($fid);
	     	 foreach ($data['fname'] as $folder) {
	     	 	$fid1 = $folder['infolder'];   	 	
	     	 }
	     	 //echo $fid1;
	     	 $data['fname1'] = $this->_model->folder_name1($fid1);
	     	 foreach ($data['fname1'] as $folde) {
	     	 	$fid2 = $folde['infolder'];   	 	
	     	 }
	     	 //echo $fid2;
	         $data['fname2'] = $this->_model->folder_name1($fid2);
	     	 $data['folder'] = $this->_model->selectSingle($fid);	     	 
	     	 $this->_view->render('folder/list_depth2',$data); 
	  		 $this->_view->render('footer');
	     }
   }
    public function depth3($id){
   		 $data['title'] = strtoupper(Session::get('general'))."_Folder";
   		 $data['header'] = 'Create Hour';
   		 $data['button'] = 'Create Hour Folder';
		 $data['format'] = 'Example : 00';
   	 	 $id = (int)$id;
	     if ($id > 0) 
	     {
	     	 $fid = $id; 	 
	     	 //$data['files'] = $this->_model->selectSingle($id);
	     	 $data['depth'] = 3;
	     	 $data['fid'] = $fid;
	     	 $this->_view->render('header', $data);
	     	 $this->_view->render('folder/folder_form',$data);
	     	 $data['fname'] = $this->_model->folder_name($fid);
	     	 foreach ($data['fname'] as $folder) {
	     	 	$fid1 = $folder['infolder'];   	 	
	     	 }
	     	 $data['fname1'] = $this->_model->folder_name1($fid1);
	     	 foreach ($data['fname1'] as $folder) {
	     	 	$fid2 = $folder['infolder'];   	 	
	     	 }
	     	 $data['fname2'] = $this->_model->folder_name1($fid2);
	     	 foreach ($data['fname2'] as $folder) {
	     	 	$fid3 = $folder['infolder'];   	 	
	     	 }
	     	 $data['fname3'] = $this->_model->folder_name1($fid3);
	     	 $data['folder'] = $this->_model->selectSingle($fid);	     	 
	     	 $this->_view->render('folder/list_depth3',$data); 
	  		 $this->_view->render('footer');
	     }
   }

   public function depth4($id){
   		 $data['title'] = strtoupper(Session::get('general'))."_Folder";
   	 	 $id = (int)$id;
	     if ($id > 0) 
	     {
	     	 $fid = $id;
	     	 $data['fid']=$fid;
	     	 $this->_view->render('header', $data);
	     	 $this->_view->render('bins/upload_form', $data);	         
	     	 $data['fname'] = $this->_model->folder_name($fid);
	     	 foreach ($data['fname'] as $folder) {
	     	 	$fid1 = $folder['infolder'];   	 	
	     	 }
	     	 $data['fname1'] = $this->_model->folder_name1($fid1);
	     	 foreach ($data['fname1'] as $folder) {
	     	 	$fid2 = $folder['infolder'];   	 	
	     	 }
	     	 $data['fname2'] = $this->_model->folder_name1($fid2);
	     	 foreach ($data['fname2'] as $folder) {
	     	 	$fid3 = $folder['infolder'];   	 	
	     	 }
	     	 $data['fname3'] = $this->_model->folder_name1($fid3);
	     	 foreach ($data['fname3'] as $folder) {
	     	 	$fid4 = $folder['infolder'];   	 	
	     	 }
	     	 $data['fname4'] = $this->_model->folder_name1($fid4);
	     	 $data['bin'] = $this->_model->selectBins($fid);
	     	 $this->_view->render('bins/list',$data); 
	  		 $this->_view->render('footer');
	     }
   }
   public function delete($id) {
	     $id = (int)$id;
	     if ($id > 0) 
	     {
		     	 $data['files'] = $this->_model->selectSingle($id);
		     	 foreach ($data['files'] as $files) {
		     	 	$filesss = $files['filedir'].$files['filetitle'];
		     	 	unlink($filesss);
		     	 	$this->_model->deleteFiles($id);
	             }
			 	 $this->_model->delete($id);

         }
	     header('Location: ' . $_SERVER['HTTP_REFERER']);
   }
   /*
   public function edit($id){
   		if (Session::get('username')){
	   		if (isset($_POST["folder_name"])){
	   			$data["name"]=$_POST["folder_name"];   			
	   			$data["edited_at"] = date('Y-m-d H:i:s');
	   			$data["id"] = $id;
	   			$this->_model->update($data);
	   			Message::set("Ordner '".$_POST['folder_name']."' aktualisiert!");
	   		}
	   	}else{
	   		Message::set("Keine Berechtigung");
	   	}
   		header('Location: ' . $_SERVER['HTTP_REFERER']);
   }*/
   
    public function edit($id){
	   	$id = (int)$id;
	     if ($id > 0) {
	         $data['folder'] = $this->_model->single($id);
	         echo $id;
	         # check products != null;
	         if ($data['folder'] != null) {
	            //$data['title'] = 'Edit file';
	            //$data['form_header'] = 'Spiel Editieren';
	            $this->_view->render('header', $data);
	            //if (Session::get('username')){
	            //if (isset($_COOKIE["login"])){
	               $this->_view->render('folder/edit_form', $data);
	            //}else{
	               //Message::set("Sie haben hier keine Rechte um die Funktion zu verwenden!"); 
	               //Message::show();
	            //}
	            $this->_view->render('footer');
	          }
	      }else{
	      	   echo $id; 	
	           //$this->insert();
	    }

   }
    public function update() {
     #produkt daten wirklich gesetzt?
     if (isset($_POST["name"]))
	     {
	      # mache was
	      $data['id'] = $_POST['id'];
	      $data['name'] = $_POST["name"];
	      $this->_model->update($data);
	     }
	  header("Location: ".DIR."folder");
      //header('Location: ' . $_SERVER['HTTP_REFERER']);
   }
}
?>