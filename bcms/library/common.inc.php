<?php

//Default Application required

define('DEFAULT_APP','main');



//Please dont make any changes here
define ('DEVELOPMENT_ENVIRONMENT',true);

global $url;



//define paths 
define('ERROR_F', ROOT. DS . 'error');
define('ERROR_CONTROLLER', ROOT. DS . 'error'. DS .'ErrorController.php');
define('ERROR_L',ROOT.DS.'tmp'.DS.'logs'.DS.'error.log');
define('APP_F', ROOT . DS . 'apps');




