<?php
  class userModel{
   function __construct() {
      include_once("db/connection.php");
	  connection();
   }

   function showUserListing(){
            $query="SELECT um.UserId,UserEmailId,UserFirstName,UserLastName,DOB,Address, Country 
			FROM usermst um,userprofile up 
			where um.UserId=up.UserId";
            $res=mysql_query($query);
            $checkData=mysql_num_rows($res);
            $arrUser=array();
            if($checkData > 0){
                while($row=mysql_fetch_assoc($res)){
                      $arrUser[]=$row;
                }
                return $arrUser;
            }
   }
   
   function userDetails($arrArgument){
            $id=$arrArgument['id'];
            $query="SELECT um.UserId,UserEmailId,UserFirstName,UserLastName,DOB,Address, Country 
			FROM usermst um,userprofile up 
			where um.UserId=up.UserId and um.UserId='$id'";
            //exit();
			$res=mysql_query($query);
            $checkData=mysql_num_rows($res);
            $arrUser=array();
            if($checkData > 0){
                $row=mysql_fetch_assoc($res);
                $arrUser[]=$row;
            }
			//print_r($arrUser);
			return $arrUser;
   }
    
}
?>