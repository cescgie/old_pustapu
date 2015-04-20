<?php

class URL {

   public static function redirect($url = null, $status) {
      if (!isset(self::$messages[$status])) {
         $status = 303;
      }
      header(self::$messages[$status], true, $status);
      header('Location: ' . DIR . $url);
      exit;
   }

   public static function halt($status = 404, $message = 'Something went wrong.') {
      if (ob_get_level() !== 0) {
          ob_clean();
      }

      http_response_code($status);
      $data['status'] = $status;
      $data['message'] = $message;

      if (!file_exists("views/error/$status.php")) {
         $status = 'default';
      }
      require "views/error/$status.php";

      exit;
   }

   public static function STYLES($filename = false, $path = 'static/css/') {
      if ($filename) {
         $path .= "$filename.css";
      }
      return DIR . $path;
   }
   public static function FONTS($filename = false,$filetype, $path = 'static/font-awesome/') {
      if ($filename) {
         $path .= "$filename.$filetype";
      }
      return DIR . $path;
   }

   public static function SCRIPTS($filename = false, $path = 'static/js/') {
      if ($filename) {
         $path .= "$filename.js";
      }
      return DIR . $path;
   }

   public static function IMAGES($filename = false, $filetype, $path = 'static/img/') {
      if ($filename) {
         $path .= "$filename.$filetype";
      }
      return DIR . $path;
   }
}
