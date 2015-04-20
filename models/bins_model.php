<?php

class Bins_Model extends Model {

   public function __construct(){
      parent::__construct();
   }

   /**
   * Gibt die letzten 20 Einträge im Archiv zurück.
   * @return array Liste aus bin mit id
   */
   public function all() {
      return $this->_db->select('SELECT * FROM ga ORDER BY id DESC LIMIT 0, 20');
   }

   public function insert($data) {
     $this->_db->insert('bin', $data);
   }

   public function count(){
      return $this->_db->select("SELECT IpAddress,count(IpAddress) as Summe FROM ga GROUP BY IpAddress HAVING count(*) >100 ORDER BY count(*) DESC");

   }
   public function single($id) {
      #check
      if (is_int($id))
         return $this->_db->selectsingle("SELECT * FROM bin WHERE infolder = $id");
      else
         return null;
   }
   public function file_name($id){
      if (is_int($id))
         return $this->_db->select("SELECT filedir,filetitle FROM files WHERE id = $id");
      else
         return null;
   }
   public function file_bin($id){
      if (is_int($id))
         return $this->_db->select("SELECT filetitle,filedir FROM bin WHERE id = $id");
      else
         return null;
   }

}