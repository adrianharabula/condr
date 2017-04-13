<?php
require('../autoload.php');

$db = new Database\Database;
$utils = new Utils\Utils;

if (empty($_REQUEST['user_id'])) {
  exit("Please select user_id!");
}
$user_id = $_REQUEST['user_id'];

$db->query("delete from users where user_id = :p1");
$db->bind(":p1", $user_id);
$db->execute();
// $utils->debug($db->execute());

?>

<h1>User deleted</h1>
