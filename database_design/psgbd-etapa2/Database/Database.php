<?php
namespace Database;
use Config\Config as cfg;

/*
* Database class
* Used for database operations between PHP and Oracle Database
* Uses OCI8 library for communication
*/
class Database {
  private $conn;
  private $stid;

  /*
  * Initialize database connection
  * USAGE EXAMPLE: $db = new Database\Database; // this creates a conn to db
  */
  public function __construct(){
      // Initiate database connection
      $this->conn = oci_pconnect(cfg::$DB_USER, cfg::$DB_PASS,
                          cfg::$DB_HOST.':'.cfg::$DB_PORT.'/'.cfg::$DB_SID);

      // On connection error
      if (!$this->conn) {
          $e = oci_error();
          trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
          exit;
      }
  }

  /*
  * Updated function
  * SQL Injection proof
  * USAGE EXAMPLE: $db->query("select * from users where id = :p1");
  *                $db->bind(":p1", "4");
  *                $utils->debug($db->execute());
  */
  public function query($statement) {

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

  /*
  * Used to execute query
  * USAGE EXAMPLE: $result = $db->plainQuery("select * from users");
                   $utils->debug($result);
  */
   public function execute() {
    // execute query
    $stmt = oci_execute($this->stid);

    // if error on execution
    if (!$stmt) {
       $oerr = oci_error($this->stid);
       echo "Query execution error: " . $oerr["message"];
       exit;
    }

    return $this;
  }

  /*
  * Return result as a array of objects
  * USAGE EXAMPLE: $result = $db->query("select * from users")->execute()->result();
                   $utils->debug($result);
  */
  public function result() {
    // parse all rows in res
    while ( $res[] = oci_fetch_object($this->stid) ) ;

    // delete last NULL element
    array_pop($res);

    // return res
    return $res;
  }

  /*
  * Return first row as an obj
  * USAGE EXAMPLE: $result = $db->query("select * from users")->execute()->result();
                   $utils->debug($result);
  */
  public function firstResult() {
    return oci_fetch_object($this->stid);
  }


  /*
  * Used to bind parameters
  * USAGE EXAMPLE The same as oci_bind_by_name, it just ads chaining capability
  *               $db->query("select * from users where user_id = :p1 ");
  *               db->bind(":p1", "4");
  *               $db->execute();
  */
  public function bind($bv_name, &$variable, ...$params) {
    oci_bind_by_name($this->stid, $bv_name, $variable, ...$params);
    return $this;
  }
}
