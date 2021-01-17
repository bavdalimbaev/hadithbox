<?php
ini_set('date.timezone','Asia/Bishkek');

ini_set('display_errors',1);

error_reporting(0);
session_start();


define('ROOT', dirname(__FILE__));
define('URL', 'https://hadithtezal.herokuapp.com');

require_once(ROOT . '/mvc/components/Autoload.php');

$router = new Router();
$router->run();