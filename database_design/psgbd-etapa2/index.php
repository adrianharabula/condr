<?php
define('BASE_PATH', realpath(dirname(__FILE__)));
function my_autoloader($class)
{
    $filename = BASE_PATH . '/' . str_replace('\\', '/', $class) . '.php';
    include($filename);
}
spl_autoload_register('my_autoloader');

$db = new Database\Database;
$utils = new Utils\Utils;

// get all users in $res
// WARNING! Vulnerable to SQL Injection!
$result1 = $db->plainQuery("select * from users");
$utils->debug($result1);

// The updated query
// non-vulnerable to sql injection
$db->query("SELECT * FROM users WHERE user_id in (:p1, :p2, :p3)");
$db->bind(":p1", "1");
$db->bind(":p2", "4");
$db->bind(":p3", "5");
$result2 = $db->execute();

$utils->debug($result2);
