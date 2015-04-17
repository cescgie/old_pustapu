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
      return $this->_db->select('SELECT * FROM folder ORDER BY id DESC LIMIT 0, 20');
   }

   public function insert($data) {
     $this->_db->insert('folder', $data);
   }

    public function update($data) {
     $this->_db->update('folder', $data, 'id = '.$data['id']);
   }

   public function delete($id) {
      #check
      if (is_int($id))
         return $this->_db->delete('folder', 'id ='.$id);
      else
         return null;
   }

   public function single($id) {
      #check
      if (is_int($id))
         return $this->_db->selectsingle("SELECT * FROM folder WHERE id = $id");
      else
         return null;
   }
   public function folder_name($id){
      if (is_int($id))
         return $this->_db->select("SELECT id,name FROM folder WHERE id = $id");
      else
         return null;
   }
   public function selectSingle($id){
      if (is_int($id))
         return $this->_db->select("SELECT * FROM files WHERE infolder_id = $id ORDER BY created_at DESC");
      else
         return null;
   }
   public function deleteFiles($id){
      #check
      if (is_int($id))
         return $this->_db->delete('files', 'infolder_id ='.$id);
      else
         return null;
   }

}