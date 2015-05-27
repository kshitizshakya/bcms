<?php
  class rewordPointActionModel
{
   function __construct() 
	{
      include_once("db/connection.php");
	  connection();
	}

  
   
   function addPoint($id , $uid)
	{
	   if (!isset($uid) and !isset($id) and $id==null)
			{
			//rediredct to login page

			}
		else
			{
			$arrCart=array();
			
			$time=date('Y-m-d H:i:s');
			
			  for($i=0;$i<sizeof($id);$i++)
				{
					if ($id[$i]==0)
					{}
					else
					{
						$query="select * from mycart where UserId=".$uid." and CourseId=".$id[$i]." and EnrollFlag=0";

						//$query="insert into mycart(UserId,CourseId,EnrollFlag,DOC) values('".$uid."','".$id[$i]."',0,'".$time."')";
				       $res=mysql_query($query) or die(mysql_error());
					   
						 $checkData=mysql_num_rows($res);
						//echo $checkData;
				       if($checkData == 0)
						{
							//echo "inside if";
						   	$query="insert into mycart(UserId,CourseId,EnrollFlag,DOC) values('".$uid."','".$id[$i]."',0,'".$time."')";
							mysql_free_result($res);
							 $res=mysql_query($query) or die(mysql_error());

						
						}	
						else
					    { 	//print "alert('hi')";
						}
					}
				}	
				
				
			}
	}


   function redeemePoint($amt,$uid)
	{
	
		if (!isset($uid))
			{
			//rediredct to login page
			}
		else
			{
			
			//echo $cid;
			$redeemto = "";
			switch($amt[1])
				{
					case 0 : $redeemto="Course"; break;
					case 1 : $redeemto="Gift"; break;
					case 2 : $redeemto="Invite Event"; break;
				}
			$_SESSION['discid']+=$amt[0];

			//INSERT INTO rewordpoint_hostory(UserId, pointAdd, rewordBy, pointRedeeme, redeemeTo, availablePoint, DOC) VALUES ($uid,'','',,[value-6],[value-7],[value-8])

			//$query="DELETE from mycart where UserId='".$uid ."' and CourseId='".$cid."'" ;
			$tup = date('Y-m-d H:i:s');
			$query="INSERT INTO rewordpoint_hostory(UserId, pointAdd, rewordBy, pointRedeeme, redeemeTo, availablePoint, DOC) VALUES (".$uid.",0,'none',".$amt[0].", '".$redeemto."' ,". $amt[2] .",'" . $tup ."')";
            $res=mysql_query($query) or die (mysql_error());

			if($res)
			{
			$tuprp=date('Y-m-d H:i:s');
				$sql="UPDATE rewordpoint SET availablePoint=".$amt[2].", DOU= '". $tuprp ."' WHERE UserId =".$uid;
				$rel=mysql_query($sql);
				if ($rel)
				{
				return 1 ;
				}

			}
           
				
			}//endif
	}//endfn
	

   function showPoint($uid)
	   //to display reword point details for user logged in
	{  
		//echo"uid:" . $uid;
		$arrPoint=0;
		if (!isset($uid))
			{
			//rediredct to login page
			}
		else
			{
			$query="SELECT  availablePoint	FROM rewordpoint where UserId=".$uid;
            $res=mysql_query($query);
            $checkData=mysql_num_rows($res);
			//echo $checkData . "row";
             if($checkData > 0)
				{
					while($row=mysql_fetch_assoc($res))
						{
						  $arrPoint=$row['availablePoint'];
						}
				mysql_free_result($res);
				return $arrPoint; 

				}
								 
			}
				
		   	
	}

	function returnDiscount($uid)
	{	$arrpoint=0;
			if (!isset($uid))
			{
			//rediredct to login page
			}
		else
			{
				$query="SELECT  availablePoint	FROM rewordpoint where UserId=".$uid;
				$res=mysql_query($query);
				$checkData=mysql_num_rows($res);
			//echo $checkData . "row";
				  if($checkData > 0)
					{
						while($row=mysql_fetch_assoc($res))
						{
						  $arrPoint=$row['availablePoint'];
						}
					
						$arrPoint+=$_SESSION['discid'];				 
		

						$tup = date('Y-m-d H:i:s');
						$query1="INSERT INTO rewordpoint_hostory(UserId, pointAdd, rewordBy, pointRedeeme, redeemeTo, availablePoint, DOC) VALUES (".$uid.",".$_SESSION['discid'].",'re-payback',0, 'none' ,".$arrPoint.",'" . $tup ."')";
						 $res1=mysql_query($query1) or die (mysql_error());

						if($res1)
						{
							$tuprp=date('Y-m-d H:i:s');
							$sql="UPDATE rewordpoint SET availablePoint=".$arrPoint.", DOU= '". $tuprp ."' WHERE UserId =".$uid;
							$rel=mysql_query($sql);
							if ($rel)
							{
								$_SESSION['discid']=0;
							}
						}
					}
			}
		}
	
  
    
}

?>