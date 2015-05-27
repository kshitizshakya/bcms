<?php
  class rewordPointAction
  {
  public $UID;

   function __construct() {
	$this->UID=	$_SESSION['id'];
   }

   function addPoint()
	{
		/*loadView('header.php');
		//$arrID ='';
		//echo $_REQUEST['id'];
		//echo $this->UID ;
		if (isset($_REQUEST['id']))
		{
			$arrID = explode(',',$_REQUEST['id']);
			loadModel2p('myCartAction','addMyCart',$arrID,$this->UID );
		}
		else
		{	}
		loadView('myCartView.php');    
		loadView('footer.php');*/
   }

   function redeemePoint()
	{	
		if (isset($_REQUEST['pdata']))
		{ 
			$arrdata = explode('~',$_REQUEST['pdata']);

			//print_r($arrdata);
			$res=loadModel2p('rewordPointAction','redeemePoint',$arrdata,$this->UID );
			if($res==1)
			{
				loadModel2p('myCartAction','setDiscount',$arrdata[3],$this->UID);
				//echo"hello;";
			}
		}
		else
		{ 

		}
}

   function showPointUI()
	{	
		$disc=loadModel('myCartAction','getDiscount',$this->UID);
		loadView('rewordPointView.php',$disc);
		
    }

	function showPointUIAjax()
	{	
		$avPoint=loadModel('rewordPointAction','showPoint',$this->UID);
		// echo $avPoint;
		 loadView('rewordPointUIView.php',$avPoint);
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