 <?php
 
 $Appname = "";


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

function after ($this, $inthat){
  if (!is_bool(strpos($inthat, $this))){
    return substr($inthat, strpos($inthat,$this)+strlen($this));
  }
}

function before ($this, $inthat){
        return substr($inthat, 0, strpos($inthat, $this));
}

/** Main Call Function **/
 
function callHook() {

    global $url;

    $urlArray = array();
    $urlArray = explode("/",$url);
    $app = $urlArray[0]; 

    loadApplication($app);
     
}
 


/** Autoload any classes that are required **/

function loadApplication($appname){
  global $url;

  $appname = strtolower($appname); 

  global $Appname;
  $Appname=$appname;
  
  $data = after($appname,$url);
  
  if (file_exists(APP_F . DS. $appname)){

    require_once(APP_F . DS . $appname . DS .'config'. DS .'config.php');
   
    if (file_exists(APP_F. DS . $appname . DS . 'route' . DS . 'app_route.php')){
        
        require_once(APP_F. DS . $appname . DS . 'route' . DS . 'app_route.php');

        $obj = new AppRoute($data);
        $obj->init($data);
        
    } else{
      trigger_error(404,E_USER_ERROR);
    }
  } else{
        //SysErrorHandler
        trigger_error(404,E_USER_ERROR);
  }
}

function loadView($templateName,$arrPassValue='',$arrPassValue2=''){

        global $Appname;
         $view_path= APP_F . DS . $Appname . DS .'view'.DS.$templateName;


         if(file_exists($view_path)){

            if(isset($arrPassValue)){
                 $arrValue=$arrPassValue;
            }
            if(isset($arrPassValue2))
            {
                 $arrValue2=$arrPassValue2;
            }

            require_once($view_path);
         }
         else
         {
            die($templateName. ' Template Not Found under View Folder');
         }

}


function loadModel($modelName,$function,$arrArgument=''){
        $model_path=APP_F . DS . $Appname . DS .'view'.DS.$modelName.'.php';

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


function loadController($controller,$function){

global $Appname;
 // echo "$controller" . $Appname .$function ;
  $controller=strtolower($controller);

  $fn = APP_F. DS . $Appname . DS .'controller'. DS . $controller . '.php';
  //echo $fn;

  if(file_exists($fn)){

      require_once($fn);

      $controllerClass= $controller.'Controller';
         $obj=new $controllerClass;
      if(!method_exists($controllerClass,$function)){
         die($function .' function not found');      }
  
   
      $obj-> $function();

  }else{
      die($controller .' controller not found');
  }
}

 
setReporting();
removeMagicQuotes();
unregisterGlobals();
callHook();

