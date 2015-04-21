<?php

class Folder_Model extends Model {

   public function __construct(){
      parent::__construct();
   }

   /**
   * Gibt die letzten 20 Einträge im Archiv zurück.
   * @return array Liste aus Produkten mit id, timestamp, name, url, image und price
   */
   public function all() {
      return $this->_db->select('SELECT * FROM '.Session::get("folder").' WHERE depth=0 ORDER BY id DESC LIMIT 0, 20');
   }

   public function insert($data) {
     $this->_db->insert(Session::get("folder"), $data);
   }

    public function update($data) {
     $this->_db->update(Session::get("folder"), $data, 'id = '.$data['id']);
   }

   public function delete($id) {
      #check
      if (is_int($id))
         return $this->_db->delete(Session::get("folder"), 'id ='.$id);
      else
         return null;
   }

   public function single($fid1) {
      #check
      if (is_int($fid1))
         return $this->_db->selectsingle("SELECT * FROM ".Session::get('folder')." WHERE id = $fid1");
      else
         return null;
   }

    public function single2($id) {
      #check
      if (is_int($id))
         return $this->_db->selectsingle("SELECT * FROM ".Session::get('folder')." WHERE infolder = $id AND depth=1");
      else
         return null;
   }

   public function folder_name($fid){
      if (is_int($fid))
         return $this->_db->select("SELECT id,name,infolder FROM ".Session::get('folder')." WHERE id = $fid");
      else
         return null;
   }
   public function folder_name1($fid1){
         return $this->_db->select("SELECT id,name,infolder FROM ".Session::get('folder')." WHERE id = $fid1");
   }
   public function selectSingle($fid){
      if (is_int($fid))
         return $this->_db->select("SELECT * FROM ".Session::get('folder')." WHERE infolder = $fid ORDER BY created_at DESC");
      else
         return null;
   }
   public function selectBins($fid){
      if (is_int($fid))
         return $this->_db->select("SELECT * FROM ".Session::get('bin')." WHERE infolderid = $fid ORDER BY created_at DESC");
      else
         return null;
   }
   /*public function deleteFiles($id){
      #check
      if (is_int($id))
         return $this->_db->delete('files', 'infolder_id ='.$id);
      else
         return null;
   }*/

}