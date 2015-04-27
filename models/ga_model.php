<?php

class Ga_Model extends Model {

   public function __construct(){
      parent::__construct();
   }

   /**
   * Gibt die letzten 20 Einträge im Archiv zurück.
   * @return array Liste aus bin mit id
   */
   public function all() {
      return $this->_db->select('SELECT * FROM ga_table ORDER BY id DESC LIMIT 0, 20');
   }
   public function count(){
      return $this->_db->select("SELECT IpAddress,count(IpAddress) as Summe FROM ga_table GROUP BY IpAddress HAVING count(*) >100 ORDER BY count(*) DESC LIMIT 0,10");
   }
   public function all_ip(){
      return $this->_db->select("SELECT IpAddress,count(IpAddress) as Summe FROM ga_table GROUP BY IpAddress HAVING count(*) >1 ORDER BY count(*) DESC");
   }
   public function all_user(){
      return $this->_db->select("SELECT UserId,count(UserId) as Summe FROM ga_table GROUP BY UserId HAVING count(*) >1 ORDER BY count(*) DESC");
   }
   public function sum(){
      return $this->_db->select("SELECT count(*) as 'Summe' from ga_table");
   }
}