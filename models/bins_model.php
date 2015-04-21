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
         return $this->_db->selectsingle("SELECT * FROM bin WHERE id = $id");
      else
         return null;
   }

   public function single2($id) {
      #check
      if (is_int($id))
         return $this->_db->selectsingle("SELECT * FROM bin WHERE infolderid = $id");
      else
         return null;
   }
   public function select_ga($filename) {
      #check
      if (is_int($id))
         return $this->_db->select("SELECT * FROM ga WHERE filename = $filename");
      else
         return null;
   }

    public function file_gz($id) {
      #check
      if (is_int($id))
         return $this->_db->select("SELECT filedir,filetitle,filesize FROM bin WHERE infolderid = $id");
      else
         return null;
   }

   public function file_name($id){
      if (is_int($id))
         return $this->_db->select("SELECT filedir,filetitle FROM bin WHERE id = $id");
      else
         return null;
   }

   public function file_name2($id){
      if (is_int($id))
         return $this->_db->select("SELECT filedir,filetitle,filesize FROM bin WHERE infolderid = $id");
      else
         return null;
   }
   public function file_bin($id){
      if (is_int($id))
         return $this->_db->select("SELECT filetitle,filedir FROM bin WHERE id = $id");
      else
         return null;
   }
   public function delete($id) {
      #check
      if (is_int($id))
         return $this->_db->delete('bin', 'id ='.$id);
      else
         return null;
   }
   public function delete_sel($id) {
      #check
      if (is_int($id))
         return $this->_db->delete_selc('bin', 'infolderid ='.$id);
      else
         return null;
   }

   public function delete_ga($file) {
      #check
      if($file)
         return $this->_db->delete_selc('ga', 'filename ='.$file);
      else
         return null;
   }

   /*public function update($data) {
     $this->_db->update('bin' , $data, 'id = '.$data['id']);
   }*/
   public function update($data) {
     $this->_db->update('bin', $data, 'ID = '.$data['id']);
   }

   public function update_all($data) {
     $this->_db->update('bin', $data, 'infolderid = '.$data['id']);
   }
   
   public function ga_insert($datas) {
     $this->_db->insert('ga', $datas);
   }

}