<?php

class Bins extends Controller {

   public function __construct() {
      parent::__construct();
   }

   public function index() {
      $data['title'] = 'Übersicht';
      $data['bins'] = $this->_model->all();

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

   public function upload() {
      if(isset($_POST['upfile'])){
         //$folder = Date();
         /*if(!is_dir($folder)){
            mkdir($folder);
         }*/
         move_uploaded_file($_FILES["uploaded"]["tmp_name"],'uploads/'.$_FILES['uploaded']['name']);
                     
        } 
        //header("Refresh:0; url='../../bins'");
    }

}