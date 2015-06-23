<?php 
function SysErrorHandler($code, $message, $errFile, $errLine) 
{ 
  //Set message/log info 
$subject = "$code  :  $message: MAJOR PROBLEM at " . "Test" . ': ' . date("F j, Y, g:i a"); 
  $body = "<pre>Error <br> $errFile\r\n". "on line no :  $errLine\r\n" . trigger_dump($GLOBALS); 

 
  error_log("$subject\r\n $body"); 

 
	if($message == '404')
	{
  echo "code  :"  . $message ;//subject;*/
	//echo "Error code ";
  //redirect to the error code
  }


	if($message == "501")
  {
    echo $body . "code  :"  . $code ;//subject;
  }
  

  
  exit; 
} 

  /* 
    The function below is called by the mail 
    and error_log calls above. 
  */ 

function trigger_dump( $mixed,$type = 0 ) { 
  /* 
    $mixed will handle whatever you may decide to pass to it. 
    $type will determine what this function should do with the 
    information obtained by var_dump 
  */ 
  switch( (int) $type ) { 
    case 0: 
      /* 
      Grab the contents of the output buffer 
      when you want to send the information 
      back to the calling function 
      */ 
      ob_start(); 
      var_dump($mixed); 
      //If you are using PHP ver. 4.3 use the 
      //code below: 
      return ob_get_clean(); 
      //If you are using an earlier version 
      //of PHP, then use the code below: 
      $ob_contents = ob_get_contents(); 
      ob_end_clean(); 
      return $ob_contents; 
    case 1: 
      /* 
       When you want to display the information to the browser 
      */ 
      print '<pre>'; 
      var_dump($mixed); 
      print '</pre>'; 
      break; 
    case 2: 
      //When you want your error handler to deal with the information 
      ob_start(); 
      var_dump($mixed); 
      //If you are using PHP ver. 4.3 use the 
      //code below: 
      trigger_error(ob_get_clean()); 
      break;

      //If you are using an earlier version 
      //of PHP, then use the code below: 
      $ob_contents = ob_get_contents(); 
      ob_end_clean(); 
      trigger_error($ob_contents); 
      break; 
    } 
} 