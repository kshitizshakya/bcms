<?php    
 
define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(dirname(__FILE__)));
 
$url = $_GET['path'];
 
require_once (ROOT . DS . 'library' . DS . 'bootstrap.php');