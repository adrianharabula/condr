<?php
require('autoload.php');

$db = new Database\Database;
$utils = new Utils\Utils;

$db->query("SELECT :p1 FROM users;");
$db->bind(":p1", $var);
$result2 = $db->execute();

$utils->debug($result2);
