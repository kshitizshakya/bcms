<?php
define('SITE_ROOT','');
define('SITE_PATH','');
define('IMAGE_PATH',SITE_PATH.'images/');
define('CSS_PATH',SITE_PATH.'css/');
define('JS_PATH',SITE_PATH.'js/');
define('LIBRARY_ROOT',SITE_ROOT.'library/');
define('VIEW_PATH',SITE_ROOT.'view/');
define('MODEL_PATH',SITE_ROOT.'model/');

//admin route 
define('ADMIN_VIEW_PATH',SITE_ROOT.'admin/view/');
define('ADMIN_MODEL_PATH',SITE_ROOT.'admin/model/');

function loadView($templateName,$arrPassValue='',$arrPassValue2=''){

         $view_path=VIEW_PATH.$templateName;
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



?>