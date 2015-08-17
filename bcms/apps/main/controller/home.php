<?php
  class homeController{
   function __construct() {

   }

   function showHome()
	{
   loadView('header4.php');
   
   loadView('home4_content.php');
   
   loadView('footer.php');
   }
   
   function listing(){
	loadView('header.php');
      $arrValue=loadModel('user','showUserListing');
     // print_r($arrValue);
	  loadView('user_listing.php',$arrValue);    
      loadView('footer.php');
   }

   function detail(){
      loadView('header.php');
      $id=$_GET['id'];
      $arrArgument['id']=$id;
      $arrValue=loadModel('user','userDetails',$arrArgument);
      loadView('user_detail.php',$arrValue);
		//('view file name','first array','second array')
      loadView('footer.php');
   }
   function ajaxdetail(){
	//echo "in finction ajax detail ";	
	  $id=$_GET['id'];
      $arrArgument['id']=$id;
      $arrValue=loadModel('user','userDetails',$arrArgument);
	  loadView('user_detail_ajax.php',$arrValue);
      
   }

}