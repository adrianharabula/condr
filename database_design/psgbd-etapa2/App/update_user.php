<?php
require('../autoload.php');

$db = new Database\Database;
$utils = new Utils\Utils;

if (isset($_REQUEST['submit'])) {

  if (empty($_REQUEST['username']) || empty($_REQUEST['password']) || empty($_REQUEST['email'])) {
    exit("Please fill all fields!");
  }

  $db->query("update users set username = :p1, password = :p2, email = :p3 where user_id = :p4");
  $db->bind(":p1", $_REQUEST['username']);
  $db->bind(":p2", $_REQUEST['password']);
  $db->bind(":p3", $_REQUEST['email']);
  $db->bind(":p4", $_REQUEST['user_id']);
  $db->execute();
}

if (empty($_REQUEST['user_id'])) {
  exit("Please select user_id!");
}
$user_id = $_REQUEST['user_id'];

$db->query("select * from users where user_id = :user_id");
$db->bind(":user_id", $user_id);
$result = $db->execute()->result();
$result = $result[0];
?>

<h1>Update user form</h1>

<form action="update_user.php?user_id=<?=$_REQUEST['user_id']?>" method="post">
    <label for="username">Username: </label><br />
    <input type="text" name="username" id="username" value="<?=$result->USERNAME?>" /> <br />
    <label for="username">Password: </label><br />
    <input type="password" name="password" id="password" value="<?=$result->PASSWORD?>" /> <br />
    <label for="username">Email: </label><br />
    <input type="email" name="email" id="email" value="<?=$result->EMAIL?>" /> <br />
    <input type="submit" name="submit" id="submit" />
</form>
