<?php
namespace Database;
use Config\Config as cfg;

class Database {
  private $conn;

  public function __construct(){
      // Initiate database connection
      $this->conn = oci_connect(cfg::$DB_USER, cfg::$DB_PASS,
                          cfg::$DB_HOST.':'.cfg::$DB_PORT.'/'.cfg::$DB_SID);

      // On connection error
      if (!$this->conn) {
          $e = oci_error();
          trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
          exit;
      }
  }

  public function getVersion() {
    // parse query
    $stid = oci_parse($this->conn, 'SELECT * FROM V$VERSION');

    // if error on parse
    if (!$stid) {
       $oerr = oci_error($this->conn);
       echo "Query parse error:".$oerr["message"];
       exit;
    }

    // execute query
    $stmt = oci_execute($stid);

    // if error on execution
    if (!$stmt) {
       $oerr = oci_error($stid);
       echo "Query execution error: " . $oerr["message"];
       exit;
    }

    // parse all rows and print them
    while ( $res = oci_fetch_object($stid) ) {
      print_r($res);
      echo '<br />';
    }

  }
}
