<?php
namespace Database;
use Config\Config as cfg;

class Database {
  public function __construct(){
      // Initiate database connection
      $conn = oci_connect(cfg::$DB_USER, cfg::$DB_PASS,
                          cfg::$DB_HOST.':'.cfg::$DB_PORT.'/'.cfg::$DB_SID);

      // Thrown an error if something is wrong
      if (!$conn) {
          $e = oci_error();
          trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
      }
  }
}
