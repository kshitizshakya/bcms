<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH;?>home_style.css" >
<script type="text/javascript" src="<?php echo JS_PATH?>jq/jquery-2.0.3.js"></script>

<script type="text/javascript" src="<?php echo JS_PATH?>jq/jquery.quickflip.source.js"></script>

<link href="<?php echo CSS_PATH;?>amazon_scroller.css" rel="stylesheet" type="text/css"></link>
<script type="text/javascript" src="<?php echo JS_PATH?>jq/amazon_scroller.js"></script>

<script type="text/javascript">
$(function() {
    $('.quickFlip').quickFlip();
    
    $('.quickFlip3').quickFlip({
        vertical : true
    });
    
    $('.quickFlip2').quickFlip();
});
</script>
 <script language="javascript" type="text/javascript">

            $(function() {
                $("#amazon_scroller1").amazon_scroller({
                    scroller_title_show: 'disable',
                    scroller_time_interval: '3000',
                    scroller_window_background_color: "none",
                    scroller_window_padding: '10',
                    scroller_border_size: '0',
                    scroller_border_color: '#CCC',
                    scroller_images_width: '100',
                    scroller_images_height: '80',
                    scroller_title_size: '12',
                    scroller_title_color: 'black',
                    scroller_show_count: '2',
                    directory: 'images'
                });
				$("#amazon_scroller2").amazon_scroller({
                    scroller_title_show: 'disable',
                    scroller_time_interval: '3000',
                    scroller_window_background_color: "none",
                    scroller_window_padding: '10',
                    scroller_border_size: '0',
                    scroller_border_color: '#CCC',
                    scroller_images_width: '100',
                    scroller_images_height: '80',
                    scroller_title_size: '12',
                    scroller_title_color: 'black',
                    scroller_show_count: '2',
                    directory: 'images'
                });
				
				$(".viewPreview").click(function (){
		 			$("html, body").animate({ scrollTop: 0 }, 2500);
        		});
				
				
            });
        </script>
<link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH;?>basic-quickflips.css"/>
<style>
        .black_overlay{
            display: none;
            position: absolute;
            top: 0%;
            left: 0%;
            width: 100%;
            height: 100%;
            background-color: black;
            z-index:1001;
            -moz-opacity: 0.8;
            opacity:.80;
            filter: alpha(opacity=80);
        }
        .white_content {
            display: none;
            position: absolute;
            top: 25%;
            left: 25%;
            width: 50%;
            height: 50%;
            padding: 16px;
            border: 16px solid orange;
            background-color: white;
            z-index:1002;
            overflow: auto;
			
        }
    </style>
		<!-- stylesheets -->
  	<link rel="stylesheet" href="<?php echo CSS_PATH;?>regd_style.css" type="text/css" media="screen" />
  	<link rel="stylesheet" href="<?php echo CSS_PATH;?>slide.css" type="text/css" media="screen" />
	
  	<!-- PNG FIX for IE6 -->
  	<!-- http://24ways.org/2007/supersleight-transparent-png-in-ie6 -->
	<!--[if lte IE 6]>
		<script type="text/javascript" src="js/pngfix/supersleight-min.js"></script>
	<![endif]-->
	 
    <!-- jQuery - the core -->
	<!-- Sliding effect -->
	<script src="<?php echo JS_PATH?>jq/slide.js" type="text/javascript"></script>
	   <style>
       
        a.back{
            width:256px;
            height:73px;
            position:fixed;
            bottom:15px;
            right:15px;
            background:#fff url(codrops_back.png) no-repeat top left;
        }
        .scroll{
            width:133px;
            height:61px;
            position:fixed;
            bottom:15px;
            left:150px;
           /* background:#fff url(scroll.png) no-repeat top left;*/
        }
        .info{
            text-align:right;

        }
    </style>
	<style type="text/css">
<!--

#fl_menu{position:absolute; top:100px; left:-130px; z-index:9999; width:150px; height:50px;}
#fl_menu:hover{position:absolute; top:100px; left:0px; z-index:9999; width:150px; height:50px;}
#fl_menu .label{padding-left:20px; line-height:50px; font-family:"Arial Black", Arial, Helvetica, sans-serif; font-size:14px; font-weight:bold; background:#000; color:#fff; letter-spacing:7px;}
#fl_menu .menu{display:none;}
#fl_menu .menu .menu_item{display:block; background:#000; color:#bbb; border-top:1px solid #333; padding:10px 20px; font-family:Arial, Helvetica, sans-serif; font-size:12px; text-decoration:none;}
#fl_menu .menu a.menu_item:hover{background:#333; color:#fff;}
.content{width:520px; margin:50px auto;}
-->
</style>
<!--<script type="text/javascript" src="jsfiles/jq/jquery.easing.1.3.js"></script>-->
 <link rel="stylesheet" href="<?php echo CSS_PATH;?>style_dialogs.css" />
</head>
<body>
<!--<div id="dialog" title="Basic dialog">
<p>This is the default dialog which is useful for displaying information. The dialog window can be moved, resized and closed with the 'x' icon.</p>
</div>-->
<div id="fl_menu">
	<div class="label">MENU</div>
	<div class="menu">
    	<a href="#" class="menu_item">Facebook</a>
        <a href="#" class="menu_item">Youtube</a>
        <a href="#" class="menu_item">Twitter</a>
        <a href="#" class="menu_item">Blog</a>
        <a href="#" class="menu_item">FAQ</a>
        <a href="#" class="menu_item">Search</a>
        <a href="#" class="menu_item">iWish</a>
    </div>
</div> 
<!-- Panel -->
<div id="toppanel">
	<div id="panel">
		<div class="content clearfix">
			
			<div class="left">
				<h1>Welcome to LearnerBay</h1>
				<p class="grey" align="justify">
We, at Learnerbay, are constantly trying to bridge the gap between learning and its relevance in the real world, for our learners. With that vision in mind, we bring to you an innovative event focused at bridging this gap between what happens in the classroom and how it works in the real-world.</p>
				
			</div>
			<div class="left">
			
				<!-- Login Form -->
				<form class="clearfix" action="#" method="post">
					<div id="loginScr" style="display:block;"><h1>Member Login</h1>
					<label class="grey" for="log">Email Id:</label>
					<input class="field" type="text" name="log" id="log" value="" size="23" placeholder="Requires an Email Id" required/>
					<label class="grey" for="pwd">Password:</label>
					<input class="field" type="password" name="pwd" id="pwd" size="23" placeholder="Requires an Password" required/>
	            	<label><input name="rememberme" id="rememberme" type="checkbox" checked="checked" value="forever" /> &nbsp;Remember me</label>
        			<div class="clear"></div>
					<input type="submit" name="submit" value="Login" class="bt_login" onClick="home4_loggedin.html" target="_self" />
					<a class="lost-pwd" id="linkPwd">Lost your password?</a>
					</div>
					
				</form>
			</div>
			<div class="left right">
					
				<!-- Register Form -->
				<form action="#" method="post">
					<h1>Not a member yet? Sign Up!</h1>	
					<label class="grey" for="email">Email Id:</label>
					<input class="field" type="text" name="signup" id="frm_emailid" value="" size="23" required/>
					<label class="grey" for="password">Password:</label>
					<input class="field" type="text" name="email" id="email" size="23" required/>
					<label class="grey" for="conf_password">Confirm Password:</label>
					<input class="field" type="text" name="email" id="email" size="23" required/>
					<a class="lost-pwd" id="linkPwd"><input type="checkbox" name="chk_terms" checked>Terms & Conditions</a>
					<input type="button" name="submit" value="Register" class="bt_register" id="btn_regd" />
				</form>
			</div>
		</div>
</div> <!-- /login -->	

	<!-- The tab on top -->	
	<div class="tab">
		<ul class="login">
			<li class="left">&nbsp;</li>
			<li>Hello Guest!</li>
			<li class="sep1">|</li>
			<!--<li class="sep1"><a href="user_profile.html" target="_self">Click for Profile</a></li>
			<li class="sep1">|</li> -->
			<li id="toggle">
				<a id="open" class="open" href="#">Log In | Register</a>
				<a id="close" style="display: none;" class="close" href="#">Close Panel</a>			
			</li>
			<li class="right">&nbsp;</li>
		</ul> 
	</div> <!-- / top -->
	
</div> <!--panel -->
<div id="main_div">

<!--<div id="light" class="white_content">This is the lightbox content. <a href = "javascript:void(0)" onclick = "document.getElementById('light').style.display='none';document.getElementById('fade').style.display='none'">Close</a></div>
        <div id="fade" class="black_overlay"></div>
	<div id="floats" style="position:fixed;top:100px;margin-right:20px;z-index:99999;background-color:#666666;opacity:0.8;font-family:'Courier New';font-size:14px;left:-75px;">
	<table width="90px" cellpadding="0" cellspacing="0" border="0">
	<tr><td><a href = "javascript:void(0)" onclick = "document.getElementById('light').style.display='block';document.getElementById('fade').style.display='block'">Facebook</a></td><td rowspan="6" valign="middle" align="center" bgcolor="#FFFFFF"><a href="javascript:onClick='openIt()'" ><img src="images/arrow.png" id="arr_open"></a><a href="#" onClick=""><img src="images/arrow_.png" id="arr_close"></a></td></tr>
	<tr><td><a href="#" onclick = "document.getElementById('light').style.display='block';document.getElementById('fade').style.display='block'">Blog</a></td></tr>
	<tr><td><a href="#" onclick = "document.getElementById('light').style.display='block';document.getElementById('fade').style.display='block'">Twitter</a></td></tr>
	<tr><td><a href="#" onclick = "document.getElementById('light').style.display='block';document.getElementById('fade').style.display='block'">Youtube</a></td></tr>
	<tr><td><a href="#" onclick = "document.getElementById('light').style.display='block';document.getElementById('fade').style.display='block'">FAQ</a></td></tr>
	<tr><td><a href="#" onclick = "document.getElementById('light').style.display='block';document.getElementById('fade').style.display='block'">Search</a></td></tr>
	</table>		
	</div> -->
	<div id="header">
		<div id="logo_hd">
				<img src="images/logo.png" id="lbay_logo_img">
		</div>
		
	</div>