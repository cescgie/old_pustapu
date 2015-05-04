<?php

class Ir_Model extends Model {

   public function __construct(){
      parent::__construct();
   }

   /**
   * Gibt die letzten 20 Einträge im Archiv zurück.
   * @return array Liste aus bin mit id
   */
   public function all() {
      return $this->_db->select('SELECT * FROM ir_table ORDER BY id DESC LIMIT 0, 20');
   }
   public function sum(){
      return $this->_db->select("SELECT count(*) as 'Summe' from ir_table");
   }
   public function file_name($id){
      if (is_int($id))
         return $this->_db->select("SELECT id,filedir,filetitle FROM ".Session::get('bin')." WHERE id = $id");
      else
         return null;
   }
   public function file_name2($id){
      if (is_int($id))
         return $this->_db->select("SELECT id,filedir,filetitle,filesize FROM ".Session::get('bin')." WHERE infolderid = $id");
      else
         return null;
   }
    public function _insert($datas) {
     $this->_db->insert(Session::get('table'), $datas);
   }
    public function update($data) {
     $this->_db->update(Session::get('bin'), $data, 'ID = '.$data['id']);
   }

}