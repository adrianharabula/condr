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
  * Vulnerable to SQL Injection
  * USAGE EXAMPLE: $res = $db->plainQuery("select * from users");
  */
  public function plainQuery($statement) {
    // parse query
    $this->stid = oci_parse($this->conn, $statement);

    // if error on parse
    if (!$this->stid) {
       $oerr = oci_error($this->conn);
       echo "Query parse error:".$oerr["message"];
       exit;
    }

    return $this->execute()->result();
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
  * Used to execute query
  * USAGE EXAMPLE: $result = $db->plainQuery("select * from users");
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
  * Used to bind parameters
  * USAGE EXAMPLE: $db->query("select * from users where user_id = :p1 ");
  *                $db->bind(":p1", "4");
  *                $db->execute();
  */
  public function bind($parameter, $value) {
    oci_bind_by_name($this->stid, $parameter, $value, 200);
    return $this;
  }
}
