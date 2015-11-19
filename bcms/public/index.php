<?php    
define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(dirname(__FILE__)));

require_once (ROOT . DS . 'library' . DS . 'common.inc.php');

require_once(ERROR_CONTROLLER);
set_error_handler("SysErrorHandler");

//echo "isset value". isset($_GET['path']);



if(isset($_GET['path'])){

	if(empty($_GET['path'])){

		global $url;
		$url = DEFAULT_APP;	
	}
	else{
		global $url;
		$url = $_GET['path'];
	}	
} 
else
{
	//echo "length of the string in else part  : " . strlen($_GET['path']);
	global $url;
	$url = DEFAULT_APP;	
}
	

//if url is empty display  home url or redirect to the home controller
/*please specify the  default app in settings */
 
require_once (ROOT . DS . 'library' . DS . 'bootstrap.php');