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
      return $this->_db->select('SELECT * FROM '.Session::get('table').' ORDER BY id DESC LIMIT 0, 20');
   }

   public function insert($data) {
     $this->_db->insert(Session::get('bin'), $data);
   }

   public function count(){
      return $this->_db->select("SELECT IpAddress,count(IpAddress) as Summe FROM ".Session::get('table')." GROUP BY IpAddress HAVING count(*) >100 ORDER BY count(*) DESC");

   }
   public function single($id) {
      #check
      if (is_int($id))
         return $this->_db->selectsingle("SELECT * FROM ".Session::get('bin')." WHERE id = $id");
      else
         return null;
   }

   public function single2($id) {
      #check
      if (is_int($id))
         return $this->_db->selectsingle("SELECT * FROM ".Session::get('bin')." WHERE infolderid = $id");
      else
         return null;
   }
   public function select_ga($filename) {
      #check
      if (is_int($id))
         return $this->_db->select("SELECT * FROM ".Session::get('table')." WHERE filename = $filename");
      else
         return null;
   }

    public function file_sel($id) {
      #check
      if (is_int($id))
         return $this->_db->select("SELECT id,filedir,filetitle,filesize FROM ".Session::get('bin')." WHERE infolderid = $id");
      else
         return null;
   }

   public function file_name($id){
      if (is_int($id))
         return $this->_db->select("SELECT filedir,filetitle FROM ".Session::get('bin')." WHERE id = $id");
      else
         return null;
   }

   public function file_name2($id){
      if (is_int($id))
         return $this->_db->select("SELECT id,filedir,filetitle,filesize FROM ".Session::get('bin')." WHERE infolderid = $id");
      else
         return null;
   }
   public function file_bin($id){
      if (is_int($id))
         return $this->_db->select("SELECT filetitle,filedir FROM ".Session::get('bin')." WHERE id = $id");
      else
         return null;
   }
   public function delete($id) {
      #check
      if (is_int($id))
         return $this->_db->delete(Session::get('bin'), 'id ='.$id);
      else
         return null;
   }
   public function delete_sel($id) {
      #check
      if (is_int($id))
         return $this->_db->delete_selc(Session::get('bin'), 'infolderid ='.$id);
      else
         return null;
   }

   public function delete_ga($file) {
      #check
      if($file)
         return $this->_db->delete_selc(Session::get('table'), 'filename ='.$file);
      else
         return null;
   }

   /*public function update($data) {
     $this->_db->update('bin' , $data, 'id = '.$data['id']);
   }*/
   public function update($data) {
     $this->_db->update(Session::get('bin'), $data, 'ID = '.$data['id']);
   }

   public function update_all($data) {
     $this->_db->update_all(Session::get('bin'), $data);
   }
   
   public function ga_insert($datas) {
     $this->_db->insert(Session::get('table'), $datas);
   }

}