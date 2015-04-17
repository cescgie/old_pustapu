<?php

class Folder extends Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		//data for view
		$data['title'] = 'Folder';
      	//database
      	$data['folder'] = $this->_model->all();
      	//view
      	$this->_view->render('header', $data);
	  	$this->_view->render('folder/folder_form');
	  	$this->_view->render('folder/folder_list',$data); 
	  	$this->_view->render('footer_main');
		
	}

	public function createFolder(){
		/*if(isset($_POST["folder_name"])){
			Message::set($_POST["folder_name"]);
		}
		header('Location: ' . $_SERVER['HTTP_REFERER']);*/

	   		if(isset($_POST["folder_name"])){
	   			$data['name'] = $_POST["folder_name"];
	   			Message::set("Ordner '".$data['name']."' erstellt");
	   			$this->_model->insert($data);
	   		}else{
	   			Message::set("Keine Information added");
	   		}
	     header('Location: ' . $_SERVER['HTTP_REFERER']);
   
	}

   public function selectFolder($id){
   		 $data['title'] = "Folder";
   	 	 $id = (int)$id;
	     if ($id > 0) 
	     {
	     	 $fid = $id;
	     	 $data['folder'] = $this->_model->folder_name($fid);
	     	 $data['files'] = $this->_model->selectSingle($id);

	     	 $this->_view->render('header', $data);
	     	 $this->_view->render('bin/upload_form', $data);
	     	 $this->_view->render('bin/list',$data); 
	  		 $this->_view->render('footer_main');
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
      //$this->index();
   }
}
?>