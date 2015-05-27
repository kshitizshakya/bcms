<?php
  class myCartController
  {
  public $UID;

   function __construct() {
	//$this->UID=	$_SESSION['id'];
	$this->UID= 1;
   }

   function addMyCart()
	{
		loadView('headerCart.php');
		$arrID ='';
		//echo $_REQUEST['id'];
		//echo $this->UID ;
		if (isset($_REQUEST['id']) and $_REQUEST['id']!=null)
		{
			$arrID = explode('~',$_REQUEST['id']);
			//loadModel2p('myCartAction','addMyCart',$arrID,$this->UID );
		}
		else
		{ 
		
		}
		loadView('myCartView.php');    
		loadView('footer.php');
   }

   function editMyCart()
	{
	
	
		if (isset($_REQUEST['cid']))
		{
			$arrID = $_REQUEST['cid'];
			$num=loadModel2p('myCartAction','editMyCart',$arrID,$this->UID );
			if ($num >0)
			{
			
			}
			else
			{
				loadModel('rewordPointAction','returnDiscount',$this->UID );
			}

		}
		else
		{ 
		
		}
	
   }

   function showMyCart()
	{	 
        $arrValue=loadModel('myCartAction','showMyCart',$this->UID);
		//$disc=loadModel('myCartAction','getDiscount',$this->UID);
		//echo $disc;
		//loadView('myCartViewAjax.php',$arrValue,$disc);   
		loadView('myCartViewAjax.php',$arrValue);  
	}
	function getCartCount()
	{
		$arrValue=loadModel('myCartAction','getCartCount',$this->UID);
		echo $arrValue;
		
	}

	function getDiscount()
	 {
		$disc=loadModel('myCartAction','getDiscount',$this->UID);
		return $disc;
	 }

	function setDiscount()
	{	
     	   
	}
/*
   function detail(){
      loadView('header.php');
     // $id=$_GET['id'];
      //$arrArgument['id']=$id;
      //$arrValue=loadModel('user','userDetails',$arrArgument);
      //loadView('user_detail.php',$arrValue);
		//('view file name','first array','second array')
      loadView('footer.php');
   }

   function ajaxdetail(){
	//echo "in finction ajax detail ";	
	  //$id=$_GET['id'];
      //$arrArgument['id']=$id;
      //$arrValue=loadModel('user','userDetails',$arrArgument);
	  loadView('user_detail_ajax.php',$arrValue);
      
   } -*/



}
?>