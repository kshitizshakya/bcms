<?php    
define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(dirname(__FILE__)));

require_once (ROOT . DS . 'library' . DS . 'common.inc.php');
require_once(ERROR_CONTROLLER);
set_error_handler("SysErrorHandler");



if(isset($_GET['path']))
{

	$url = $_GET['path'];	
} 
else
{
	$url = 'default/default/';
}

//if url is empty display  home url or redirect to the home controller
/*please specify the  default app in settings */
 
require_once (ROOT . DS . 'library' . DS . 'bootstrap.php');