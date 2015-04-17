<?php

class Lists_Model extends Model {

   public function __construct(){
      parent::__construct();
   }

   /**
   * Gibt die letzten 20 Einträge im Archiv zurück.
   * @return array Liste aus ga mit id
   */
   public function all() {
      return $this->_db->select('SELECT * FROM ga ORDER BY id DESC');
   }

}