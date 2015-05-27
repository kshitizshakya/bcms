<?php
  class myCartActionModel
{
   function __construct() 
	{
      include_once("db/connection.php");
	  connection();
	}

  
   
   function addMyCart($id , $uid)
	{
	   if (!isset($uid) and !isset($id) and $id==null)
			{
			//rediredct to login page

			}
		else
			{
			$arrCart=array();
			//print_r($id);

			//echo $uid;

			$time=date('Y-m-d H:i:s');
			//echo $time;
			  for($i=0;$i<sizeof($id);$i++)
				{
					if ($id[$i]==0 or $id[$i]==null )
					{
						//echo($id[$i]);
					}
					else
					{
						$query="select * from mycart where UserId=".$uid." and CourseId=".$id[$i]." and EnrollFlag=0";

						//$query="insert into mycart(UserId,CourseId,EnrollFlag,DiscountedAmt,DOC) values('".$uid."','".$id[$i]."',0,'".$time."')";
				       $res=mysql_query($query) or die(mysql_error());
					   
						 $checkData=mysql_num_rows($res);
						//echo $checkData;
				       if($checkData == 0)
						{
							//echo "inside if";
						   	$query="insert into mycart(UserId,CourseId,EnrollFlag,DiscountedAmt,DOC) values('".$uid."','".$id[$i]."',0,'0','".$time."')";
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


   function editMyCart($cid,$uid)
	{
	
		if (!isset($uid))
			{
			//rediredct to login page
			}
		else
			{
			//echo $cid;
			$query="DELETE from mycart where UserId='".$uid ."' and CourseId='".$cid."'" ;
            $res=mysql_query($query) or die (mysql_error());
			$query="select * from mycart where UserId='".$uid."'";
			$rel=mysql_query($query) or die (mysql_error());
			$num=mysql_num_rows($rel);
			return $num;
           
				
			}
	}
	
	function getcartCount($uid)
	{
			$query="select * from mycart where UserId=".$uid." and EnrollFlag=0";

						//$query="insert into mycart(UserId,CourseId,EnrollFlag,DOC) values('".$uid."','".$id[$i]."',0,'".$time."')";
			$res=mysql_query($query) or die(mysql_error());
					   
						 $checkData=mysql_num_rows($res);
						 return $checkData;

	}

   function showMyCart($uid)
	   //to display mycart details for user logged in
	{   
	$arrCart=array();
		//echo"uid:" . $uid;
		if (!isset($uid))
			{
			//rediredct to login page
			}
		else
			{
			$query="SELECT  m.CourseId , c.fullName , c.Price FROM myCart m , course c
			where m.CourseId= c.CourseId and m.EnrollFlag=0 and m.UserId=".$uid;
            $res=mysql_query($query);
            $checkData=mysql_num_rows($res);
			//echo $checkData . "row";
             if($checkData > 0)
				{
					while($row=mysql_fetch_assoc($res))
						{
						  $arrCart[]=$row;
						}
				}
				//print_r($arrCart);
				mysql_free_result($res);
				return $arrCart;  
			}
				
		   	
	}
	
   function getDiscount($uid)
	{
		$disc=0;

		if (!isset($uid))
			{
				//rediredct to login page
			}
		else
			{
				$sql="select * from mycart  WHERE UserId = '".$uid."' and EnrollFlag = 0 order by DiscountedAmt desc limit 1 ";
					 $res=mysql_query($sql) or die(mysql_error());
					   
						 $checkData=mysql_num_rows($res);
						//echo $checkData;
				       if($checkData > 0)
						{
							
							while($row=mysql_fetch_assoc($res))
							{
								$disc=$row['DiscountedAmt'];
							}
						
							//mysql_free_result($res);
							return $disc;
					
						}	
						else
					    { 	
							//print "alert('hi')";
						}

			}
	}
	
	function setDiscount($amnt , $uid)
	{
		if (!isset($uid))
			{
				//rediredct to login page
			}
		else
			{
			if($amnt!=0 and !isset($amnt))
					echo $amnt;
			//UPDATE `mycart` SET `CartId`=[value-1],`UserId`=[value-2],`CourseId`=[value-3],`DiscountedAmt`=[value-4],`EnrollFlag`=[value-5],`DOC`=[value-6] WHERE 1
				{	$sql="UPDATE mycart SET DiscountedAmt=".$amnt." WHERE UserId = '".$uid."' and EnrollFlag = 0";
					$res=mysql_query($sql) or die(Mysql_error());

				}
			
			}
	
	}
    
}

?>