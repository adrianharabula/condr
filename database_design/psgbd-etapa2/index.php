<?php
define('BASE_PATH', realpath(dirname(__FILE__)));
function my_autoloader($class)
{
    $filename = BASE_PATH . '/' . str_replace('\\', '/', $class) . '.php';
    include($filename);
}
spl_autoload_register('my_autoloader');


use Database as db;
$db = new Database\Database;

// get all users in $res
$res = $db->plainQuery("select * from users");

// print firs result
print_r($res[0]->USERNAME);
