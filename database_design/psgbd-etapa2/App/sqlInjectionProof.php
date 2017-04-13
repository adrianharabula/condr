<h1> Login Form NOT vulnerable to SQL Injection Sample </h1>
<h4> The input field is vulnerable to SQL Injection <br />
     It uses unsanitized input from user </h4>

<h2>Working login </h2>
<p>
    On valid login credentials it return the logged in user; <br />
    <a href="?submit=submit&username=AdrianHarabula&password=pass637485"> Login user Adrian </a>
</p>

<h2>Invalid credentials example </h2>
<p>
    On invalid login credentials it return an empy object; <br />
    <a href="?submit=submit&username=AdrianHarabula&password=pass637486"> Login wrong password </a> <br />
</p>

<h2> SQL Injection example </h2>
<p>
    By entering <b>' OR 1=1--</b> in username field, it returns all users and passwords from database; <br />
    <a href="?submit=submit&username=' OR 1=1--&password=pass637485"> Get all user passwords </a> <br />
</p>

<form action="sqlInjectionProof.php" method="get">
    <input type="text" name="username" />
    <input type="password" name="password" />
    <input type="submit" name="submit" />
</form>

<?php
require('../autoload.php');

$db = new Database\Database;
$utils = new Utils\Utils;

if (isset($_REQUEST['submit'])) {

  if (empty($_REQUEST['username']) || empty($_REQUEST['password'])) {
    exit("Please fill all fields!");
  }
    else {
    $username = $_REQUEST['username'];
    $password = $_REQUEST['password'];
  }

  $db->query("select * from users where username = :p1 and password = :p2");
  $db->bind("p1", $username);
  $db->bind("p2", $password);
  $result = $db->execute()->result();

  $utils->debug($result);
}
