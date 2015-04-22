<?php

class Ga extends Controller {

   public function __construct() {
      parent::__construct();
   }

   public function index() {
      $data['title'] = 'Ga';
      $data['count'] = $this->_model->count();
      $data['sum'] = $this->_model->sum();
      $data['all_ip'] = $this->_model->all_ip();
      $data['ip'] = count($data['all_ip']);
      $data['all_user'] = $this->_model->all_user();
      $data['user'] = count($data['all_user']);

      $this->_view->render('header', $data);
      $this->_view->render('ga/list', $data);
      $this->_view->render('footer');
   }
   public function sort(){
      $data['title'] = 'Ga';
      $this->_view->render('header', $data);
      $this->_view->render('ga/list', $data);
      $this->_view->render('footer');
   }
}