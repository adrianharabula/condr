<?php
require('autoload.php');

// Load Database class
$db = new Database\Database;
// Load Utils class, contains debug function
$utils = new Utils\Utils;

// make the query
$db->plainQuery("SELECT * FROM users");

// store result as an object in $result
$result = $db->execute()->result();

// print result
$utils->debug($result);
