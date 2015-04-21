<?php

class Sessi extends Controller {

   public function __construct() {
      parent::__construct();
   }

   public function index() {
      $data['title'] = 'Übersicht';
      $data['lists'] = $this->_model->all();

      $this->_view->render('header', $data);
      $this->_view->render('lists/list', $data);
      $this->_view->render('footer');
   }

   public function set_session($id){
      // remove all session variables
      session_unset();

      // destroy the session
      //session_destroy(); 
      Session::set('table', $id.'_table');
      Session::set('folder',$id.'_folder');
      Session::set('bin', $id.'_bin');
      //$_SESSION["bin"] = "ga_bin";

      //Message::set(Session::get('table').Session::get('folder').Session::get('bin'));
      header('Location: ' . DIR);

   }

}