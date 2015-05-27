<?php

 class CouponActionModel
{
	public	$LKEY;
	public  $CKEY;
   function __construct() 
	{
      include_once("db/connection.php");
	  connection();
	  $this->LKEY = "learner";
	  $this->CKEY =	"bay";
	}


	function timeAndMilliseconds($t) 
	{ 
		return array($t[1], (int)round($t[0]*1000,3)); 
	}

	function addCoupon($detail)
	{

		$uid = $detail[0];
		$cid = $detail[1] ;
		$sdate = $detail[2]; 
		$edate = $detail[3]; 
		$desc = $detail[4];
		$disc = $detail[5] ;

		$arrID = explode('~',$uid);
		$arrCID = explode('~',$cid);

	//print_r($arrCID);
//echo "count c:id". count($arrCID);
		for($i=0; $i<count($arrID); $i++)//loop for userids
		{ $ucode = $this->encrypt($arrID[$i],$this->LKEY);

			for($j=0; $j<count($arrCID); $j++)//loop for courseids
			{
				$ccode = $this->encrypt($arrCID[$j],$this->CKEY);
				$ert = date('H:i:s');
				$eda = $this->encryptdate($edate,$ert);
				$m = explode(' ',microtime());
				list($totalSeconds, $mili) = $this->timeAndMilliseconds($m); 
				$exdate = $edate." ".$ert;
				$code = $ucode.chr(rand(224,240)).$eda.$mili.chr(rand(224,240)).$ccode;
				$doc=date('Y-m-d H:i:s');
				//echo $code;
				$query="INSERT INTO coupon (Coupon ,AssignUser , AssignCourse , CouponDesc , StartDate , ExpireDate ,CouponActive , DiscountValue , DOC , DOE) VALUES ('".$code."', '".$arrID[$i]."' ,  '".$arrCID[$j]."',  '".$desc."',  '".$sdate."', '".$exdate."',  '0',  '".$disc."',  '".$doc."',  '".$doc."')";
			
				$res=mysql_query($query) or die(mysql_error());
				//mysql_free_result($res);
			}
		}

	}

	function showCoupon()
	{

	}

	function redeemCoupon($coup)
	{
		
		$detail= explode(" ",$coup);
		$discval=0;
		$u = $detail[0]; //echo $u;
		$t = substr($detail[1],0,11);
		$c = $detail[2];// echo $c;
		$udec= $this->decrypt($u,$this->LKEY);
		
		$cdec= $this->decrypt($c,$this->CKEY);
		$tdec= $this->decryptdate($t);
		$decdate=explode(" ",$tdec);
		$timestamp_start = strtotime($decdate[0]);
		$timestamp_end = strtotime(date("y-m-d"));
		$difference = $timestamp_start - $timestamp_end; 
		$days = floor($difference/(60*60*24));
		//echo "dsafsd";
		//echo $days;
		if($days >= 0)
		{
			$query ="SELECT * FROM coupon WHERE ExpireDate='".$tdec."' and AssignUser='".$udec."' and AssignCourse='".$cdec."' and CouponActive ='0'";
			$res=mysql_query($query);
            $checkData=mysql_num_rows($res);
			//echo $checkData;
			
             if($checkData>0)
				{
					while($row=mysql_fetch_assoc($res))
						{ 
						 	$d=date("y-m-d H:i:s");				
							$query1="INSERT INTO coupon_history(CouponId, UserId, CourseId, Purpose, Status,DOC) VALUES ( '".$row['CouponId']."' , '".$row['AssignUser']."' , '".$row['AssignCourse']."' , 'get discount' , 'Successful' ,'".$d."')";
							$res1=mysql_query($query1) or die(mysql_error());
							$discval=$row['DiscountValue'];
							
							$query2="UPDATE coupon SET CouponActive = '1' , DOE='".$d."' WHERE ExpireDate='".$tdec."' and AssignUser='".$udec."' and AssignCourse='".$cdec."' and CouponActive ='0'";
							$res2=mysql_query($query2) or die(mysql_error());
						}
				}
				
				
			
		}
			
		return $discval;
	}

//---------------------------------------------------------------------------------------------------------------------------------------------------
function encrypt($id,$key)
{	
	$lkey = str_split($key);

	$n=null;
	$ecode=null;
	for($i=0; $i<strlen($id); $i++)
	{ 

		$n = ord($lkey[$i]);
		
		 if($n>1)
		{
			$sum = 0;
			$l = strlen($n);
			$sum  = array_sum(str_split($n));
	    }//if
		$res=0;
		$ch=$id[$i];
		
		if($i%2==0)
		{
			$res = $this->setNumINC( $ch , $sum);
		}//if
		else
	    {
			$res = $this->setNumDEC($ch, $sum);
		}//else

        //echo $res; 
		//echo "<br> char: ".."<br>";
		$ecode.=chr($res);
	}
	//echo " encoded message : " . $ecode;
	
	return $ecode;
}

 
 function decrypt($id,$key)
{
	$n=0;
	$dcode=null;
	$lkey = str_split($key);
	for($i=0; $i<strlen($id); $i++)
	{ 

		$n = ord($lkey[$i]);
		
		 if($n>1)
		{
			$sum = 0;
			$l = strlen($n);
			$sum  = array_sum(str_split($n));
	    }//if
		$res=0;
		$ch=$id[$i];
		
		if($i%2==0)
		{
			$res = $this->setNumDEC($ch, $sum);
			
		}//if
		else
	    {
			$res = $this->setNumINC( $ch , $sum);
			
		}//else

        //echo $res; 
	$dcode.=chr($res);

	}

//echo " decoded message : " . $dcode;
return $dcode;
}


   
   function setNumINC($ch, $tmp)
    { 
         $j = ord($ch);
		 //echo $j;
            //echo "??????".$tmp;           
         $j+=($tmp%10);
         $j=$j % 48;
         $j=$j % 10;  
         $j+=48;//echo $j."-";
		// echo $j."<br/>";
         return $j;
    } 
    function setNumDEC($ch,$tmp)
    {
         $j = ord($ch);
          $j-=($tmp%10);              
         //j-=(tmp%9);
         
         
         if($j>=48)
         { 
                      
         }  
         else
         {
          
             $j=(48-$j);
             $j =((57)-$j+1);
         }
         return $j;
    }  
	
function encryptdate($date, $time)
{
	$arrD =   explode('-',$date);
    $arrT =   explode(':',$time);

	$year = $arrD[0];
	$mon = $arrD[1];
	$day = $arrD[2];

	$hr = $arrT[0];
	$min = $arrT[1];
	$sec = $arrT[2];

	$ms = $min.$sec;
	
	


	$arr=str_split($year);
	$enyr=null; //print_r($arr);
	for($i=0; $i<count($arr); $i++)
	{$tmp=0;
		if($i%2==0)
		{
			$tmp=122-$arr[$i];

			
		}
		else
		{
			$tmp=65+$arr[$i];

		}


	
		 if($enyr==null)
		{$enyr = chr($tmp);}
		else
		{$enyr.=chr($tmp);}

	}

	
	$enmon = chr((65+$mon));
	$enday = chr((122-$day));

	$enhr = chr((90-$hr));

	$arr=str_split($ms);
	$enms=null;
	for($i=0; $i<strlen($ms); $i++)
	{$tmp=0;
		if($i%2==0)
		{
			$tmp=122-$arr[$i];

			
		}
		else
		{
			$tmp=65+$arr[$i];

		}


	
		 if($enms==null)
		{$enms = chr($tmp);}
		else
		{$enms.=chr($tmp);}

	}
	$merge = $enyr.$enmon.$enday.$enhr.$enms;

	return $merge;//yyyymdhMMss
}


function decryptdate($date)
{

	//$arrD =   explode('/',$date);
    //$arrT =   explode(':',$time);

	
	$year = substr($date,0,4);
	$mon =  substr($date,4,1);
	$day =  substr($date,5,1);
	 //substr($date,0,4);
	$hr =  substr($date,6,1);
	$ms =  substr($date,7,4); //echo $ms;
	//echo "MS:".$ms."<br/>";

	//$arr=str_split($ms);

	
	$arr=str_split($year);
	//print_r($arr);
	$dcyr=null;
	for($i=0; $i<count($arr); $i++)
	{
		$tmp=0;
		if($i%2==0)
		{
			$tmp=122-ord($arr[$i]);

			//echo "<br/> ".ord($arr[$i]);
		}
		else
		{
			$tmp=ord($arr[$i])-65;
		}
	
		if($dcyr==null)
		{
			$dcyr = $tmp;
		}
		else
		{
			$dcyr.=$tmp;
		}
	}

	
	$dcmon = ord($mon)-65;
	if(strlen($dcmon)== 1)
	{
		$dcmon = "0".$dcmon;
	}
	else
	{}

	$dcday = 122-ord($day);
	$a = strlen($dcday);
	if($a == 1)
	{
		$dcday = "0".$dcday;
	}
	else
	{}

	$dchr = 90-ord($hr);
	$dcms = null;
	
	$arr=str_split($ms);
	//print_r($arr);
	for($i=0; $i<strlen($ms); $i++)
	{$tmp=0;
		if($i%2==0)
		{
			$tmp=122-ord($arr[$i]);

			
		}
		else
		{
			$tmp=ord($arr[$i])-65;

		}


	
		 if($dcms==null)
		{$dcms = (string)$tmp; }
		else
		{$dcms.=$tmp;}
	// $dcms[$i] = $tmp;
	//echo "<br/>";print($dcms);
	}
	
	
	
	$min = substr($dcms,0,2);
	//echo "MIN:".$min;
	/*if(count($min)== 1)
	{
		$sec1 = substr($min,1,1);
		$min = "0".substr($min,0,1); echo $min;
		//$min = "0".$min;
	}
	else
	{}*/


	//$sec =  null;
     $sec = substr($dcms,2,2);
	// echo "SEC:".$sec;
	 /*if(count($sec)== 1)
	{
		$sec = $sec1.$sec;
		//$sec = "0".$sec;
		
	}
	else
	{}*/
	

	$merge = $dcyr."-".$dcmon."-".$dcday." ".$dchr.":".$min.":".$sec;
	//echo $merge;
	return $merge;//yyyy/mm/dd H:i:s
}
}
?>