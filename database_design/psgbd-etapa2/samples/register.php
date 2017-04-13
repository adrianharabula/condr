<h1> Register form</h1>

<form action="register.php" method="post">
    <label for="username">Username: </label><br />
    <input type="text" name="username" id="username" /> <br />
    <label for="username">Password: </label><br />
    <input type="password" name="password" id="password" /> <br />
    <label for="username">Email: </label><br />
    <input type="email" name="email" id="email" /> <br />
    <input type="submit" name="submit" id="submit" />
</form>

<?php
require('../autoload.php');

$db = new Database\Database;
$utils = new Utils\Utils;

if (isset($_REQUEST['submit'])) {

  if (empty($_REQUEST['username']) || empty($_REQUEST['password']) || empty($_REQUEST['email'])) {
    exit("Please fill all fields!");
  }

  $username = $_REQUEST['username'];
  $password = $_REQUEST['password'];
  $email = $_REQUEST['email'];

  $db->query("DECLARE v_res number; BEGIN v_res := user_manager.register(:username, :password, :email); END;");
  $db->bind(":username", $username);
  $db->bind(":password", $password);
  $db->bind(":email", $email);
  $result = $db->execute();
}
