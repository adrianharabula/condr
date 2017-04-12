<?php
namespace Database;
use Config\Config as cfg;

class Database {
  private $conn;
  private $stid;

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

  /*
  * WARNING! Do not use this!
  * vulnerable to sql injection
  * USAGE EXAMPLE: $res = $db->plainQuery("select * from users");
  */
  public function plainQuery($statement) {
    // parse query
    $stid = oci_parse($this->conn, $statement);

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

    // parse all rows in res
    while ( $res[] = oci_fetch_object($stid) ) ;

    // return res
    return $res;
  }

  /*
  * Updated function
  * sql injection proof
  * USE this!
  * USAGE EXAMPLE: $res = $db->query("select * from users");
  */
  public function query($statement) {

    // empty previous query
    //$this->stid = NULL;

    // parse query
    $this->stid = oci_parse($this->conn, $statement);

    // if error on parse
    if (!$this->stid) {
       $oerr = oci_error($this->conn);
       echo "Query parse error:".$oerr["message"];
       exit;
    }

    return $this;
  }

  public function bind($parameter, $value) {
    oci_bind_by_name($this->stid, $parameter, $value);
    return $this;
  }

  public function execute() {
    // execute query
    $stmt = oci_execute($this->stid);

    // if error on execution
    if (!$stmt) {
       $oerr = oci_error($this->stid);
       echo "Query execution error: " . $oerr["message"];
       exit;
    }

    // parse all rows in res
    while ( $res[] = oci_fetch_object($this->stid) ) ;

    // delete last NULL element
    array_pop($res);

    // return res
    return $res;
  }
}
