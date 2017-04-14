<?php
session_start();
define('BASE_PATH', realpath(dirname(__FILE__)));
function my_autoloader($class)
{
    $filename = BASE_PATH . '/' . str_replace('\\', '/', $class) . '.php';
    include($filename);
}
spl_autoload_register('my_autoloader');

// hide all PHP errors
// error_reporting(0);
