 <?php
 
/** Check if environment is development and display errors **/
 
function setReporting() 
{
    
    if (DEVELOPMENT_ENVIRONMENT == true) 
    {
        error_reporting(E_ALL);
        ini_set('display_errors','On');
       
    } 
    else 
    {
        error_reporting(E_ALL);
        ini_set('display_errors','Off');
        ini_set('log_errors', 'On');
        ini_set('error_log', ERROR_L);
    }
}
 
/** Check for Magic Quotes and remove them **/
 
function stripSlashesDeep($value) 
{
    $value = is_array($value) ? array_map('stripSlashesDeep', $value) : stripslashes($value);
   	return $value;
}
 
function removeMagicQuotes() 
{
if ( get_magic_quotes_gpc() ) {
    $_GET    = stripSlashesDeep($_GET   );
    $_POST   = stripSlashesDeep($_POST  );
    $_COOKIE = stripSlashesDeep($_COOKIE);
}
}
 
/** Check register globals and remove them **/
 
function unregisterGlobals() {
    if (ini_get('register_globals')) {
        $array = array('_SESSION', '_POST', '_GET', '_COOKIE', '_REQUEST', '_SERVER', '_ENV', '_FILES');
        foreach ($array as $value) {
            foreach ($GLOBALS[$value] as $key => $var) {
                if ($var === $GLOBALS[$key]) {
                    unset($GLOBALS[$key]);
                }
            }
        }
    }
}
 
/** Main Call Function **/
 
function callHook() {
    global $url;
 
    $urlArray = array();
    $urlArray = explode("/",$url);
 
    $app = $urlArray[0];
echo loadApplication($app);

   /* if(loadApplication($app)== true)
    {
        echo "hsdikjksidofn";
    }
*/
    //array_shift($urlArray);
   
   /* $action = $urlArray[0];
    array_shift($urlArray);*/
   
    $queryString = $urlArray;
 
   /* $controllerName = $controller;
    $controller = ucwords($controller);

    $model = rtrim($controller, 's');
    $controller .= 'Controller';
    
    $dispatch = new $controller($model,$controllerName,$action);
 
    if ((int)method_exists($controller, $action)) {
        call_user_func_array(array($dispatch,$action),$queryString);
    } else {
        /* Error Generation Code Here * /
    *}*/
}
 
/** Autoload any classes that are required **/

function loadApplication($appname)
{
    $appname = strtolower($appname);    
    if (file_exists(APP_F . DS. $appname)) 
    {
       echo "App is present  ";
       include_once(APP_F . DS . $appname . DS . 'config.php');

       return "true";
    } 
    else
    {
        //SysErrorHandler
        trigger_error(404,E_USER_ERROR);
    }

}

 
/*function __autoload($className) 
{
    if (file_exists(ROOT . DS . 'library' . DS . strtolower($className) . '.class.php')) 
    {
        require_once(ROOT . DS . 'library' . DS . strtolower($className) . '.class.php');
    } 
    else 
    {
        if (file_exists(ROOT . DS . 'application' . DS . 'controllers' . DS . strtolower($className) . '.php')) 
        {
            require_once(ROOT . DS . 'application' . DS . 'controllers' . DS . strtolower($className) . '.php');
        } 
        else
        {   
            if (file_exists(ROOT . DS . 'application' . DS . 'models' . DS . strtolower($className) . '.php')) 
            {
                 require_once(ROOT . DS . 'application' . DS . 'models' . DS . strtolower($className) . '.php');
            } 
            else 
            {
                  // Error Generation Code Here 
            }
        }   
    }
}*/


function loadView($templateName,$arrPassValue='',$arrPassValue2='')
{

         $view_path=VIEW_PATH.$templateName;
         if(file_exists($view_path))
         {
            if(isset($arrPassValue))
            {
                 $arrValue=$arrPassValue;
            }
            if(isset($arrPassValue2))
            {
                 $arrValue2=$arrPassValue2;
            }

            include_once($view_path);
         }
         else
         {
            die($templateName. ' Template Not Found under View Folder');
         }

}

function loadAdminView($templateName,$arrPassValue='',$arrPassValue2=''){

         $view_path=ADMIN_VIEW_PATH.$templateName;
         if(file_exists($view_path)){
            if(isset($arrPassValue)){
                 $arrValue=$arrPassValue;
            }
            if(isset($arrPassValue2)){
                 $arrValue2=$arrPassValue2;
            }

            include_once($view_path);
         }else{
            die($templateName. ' Template Not Found under View Folder');
         }

}

function loadModel($modelName,$function,$arrArgument=''){
        $model_path=MODEL_PATH.$modelName.'.php';

         if(file_exists($model_path)){
            if(isset($arr)){
                 $arrData=$arrPassValue;
            }

            include_once($model_path);
            $modelClass=$modelName.'Model';
            if(!method_exists($modelClass,$function)){
                die($function .' function not found in Model '.$modelName);
            }

            $obj=new $modelClass;
            if(isset($arrArgument)){
                return $obj-> $function($arrArgument);
            }else{
                return $obj-> $function();
            }
         }else{
            die($modelName. ' Model Not Found under Model Folder');
         }

}


function loadAdminModel($modelName,$function,$arrArgument=''){
        $model_path=ADMIN_MODEL_PATH.$modelName.'.php';

         if(file_exists($model_path)){
            if(isset($arr)){
                 $arrData=$arrPassValue;
            }

            include_once($model_path);
            $modelClass=$modelName.'Model';
            if(!method_exists($modelClass,$function)){
                die($function .' function not found in Model '.$modelName);
            }

            $obj=new $modelClass;
            if(isset($arrArgument)){
                return $obj-> $function($arrArgument);
            }else{
                return $obj-> $function();
            }
         }else{
            die($modelName. ' Model Not Found under Model Folder');
         }

}


 
setReporting();
removeMagicQuotes();
unregisterGlobals();
callHook();

