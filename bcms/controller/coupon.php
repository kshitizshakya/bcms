<?php
 class couponAction
  {
  public $UID;

   function __construct() {
	//$this->UID=	$_SESSION['id'];
   }


   function addCoupon()
	{	
	   $uid = $_REQUEST['uid'];
//echo "uid:".$uid;
	$cid = $_REQUEST['cid'];
//echo "cid:".$cid;
	$sdate =  $_REQUEST['sdate'];
	$edate =  $_REQUEST['edate'];
 //echo "edate".$edate;
	$desc =   $_REQUEST['desc'];
	$disc =	 $_REQUEST['disc'];

 //$detail = new array();
 $detail[0] = $uid;
$detail[1] = $cid;
$detail[2] = $sdate;
$detail[3] = $edate;
$detail[4] = $desc;
$detail[5] = $disc;

loadModel('CouponAction','addCoupon',$detail);
 
		//loadView('header.php');
		//$arrID ='';
		//echo $_REQUEST['id'];
		//echo $this->UID ;
		//if (isset($_REQUEST['id']))
		//{
		//	$arrID = explode(',',$_REQUEST['id']);
			//loadModel2p('myCartAction','addMyCart',$arrID,$this->UID );
		//}
		//else
		//{	}
		//loadView('myCartView.php');    
		//loadView('footer.php');
   }


   function editMyCart()
	{
	
	
		if (isset($_REQUEST['cid']))
		{
			$arrID = $_REQUEST['cid'];
			loadModel2p('myCartAction','editMyCart',$arrID,$this->UID );
		}
		else
		{ 
		
		}
		//$this->showMyCart();
   }

   function showCoupon()
	{	 
        $arrValue=loadModel('myCartAction','showMyCart',$this->UID);
		loadView('myCartViewAjax.php',$arrValue);   
	   
	}

	function redeemCoupon()
	  { $disc=0;
		$coup =  $_REQUEST['coup'];
		$disc=loadModel('CouponAction','redeemCoupon',$coup);
		echo $disc;
		//loadModel2p('myCartAction','setDiscount',$arrdata[3],$this->UID);
				
		
	  }


	  function getDiscount()
	  {

	  }
	function showCouponUI()
	{
		loadView('CouponView.php');
	}


}
?>