<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<!-- latest JS include -->
<script type="text/javascript" src="../<?php echo JS_PATH?>jq/jquery-2.0.3.js"></script>
<script type="text/javascript" src="../<?php echo JS_PATH?>jquery-ui-1.10.3.custom.js"></script>
<link type="text/css" rel="stylesheet" href="../<?php echo CSS_PATH;?>jquery-ui_slider_css.css"/>
 

<!-- latest JS include -->
<link rel="stylesheet" type="text/css" href="../<?php echo CSS_PATH;?>home_style.css" >
<!-- Login and Register Panel -->
<link rel="stylesheet" href="../<?php echo CSS_PATH;?>regd_style.css" type="text/css" media="screen" />
<link rel="stylesheet" href="../<?php echo CSS_PATH;?>slide.css" type="text/css" media="screen" />
<script src="../<?php echo JS_PATH?>jq/slide.js" type="text/javascript"></script>
<script>
$(function() {
$( "#slider-range-max" ).slider({
range: "max",
min: 1,
max: 500,
value: 2,
slide: function( event, ui ) {
$( "#amount" ).val( ui.value );
}
});
$( "#amount" ).val( $( "#slider-range-max" ).slider( "value" ) );
});
</script>
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
<!-- Login and Register Panel -->	
<script src="<?php echo JS_PATH;?>jq/jquery.quickflip.source.js" type="text/javascript"></script>
<script type="text/javascript">
$(function() {
    $('.quickFlip').quickFlip();
    
    $('.quickFlip3').quickFlip({
        vertical : true
    });
    
    $('.quickFlip2').quickFlip();
});
</script>
<link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH?>jq/basic-quickflips.css"/>
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
	<script>
	function openIt(){
	alert("hi");
	
	}
	</script>
</head>
<body>
<!-- Login and Register Panel -->
<!-- Panel -->
<div id="toppanel">
	<div id="panel">
		<div class="content clearfix">
			<div class="left">
				<h1>Welcome to LearnerBay</h1>
				<p class="grey" align="justify">We, at Learnerbay, are constantly trying to bridge the gap between learning and its relevance in the real world, for our learners. With that vision in mind, we bring to you an innovative event focused at bridging this gap between what happens in the classroom and how it works in the real-world.</p>
				
			</div>
			<div class="left">
				<!-- Login Form -->
				<form class="clearfix" action="#" method="post">
					<h1>Member Login</h1>
					<label class="grey" for="log">Username:</label>
					<input class="field" type="text" name="log" id="log" value="" size="23" />
					<label class="grey" for="pwd">Password:</label>
					<input class="field" type="password" name="pwd" id="pwd" size="23" />
	            	<label><input name="rememberme" id="rememberme" type="checkbox" checked="checked" value="forever" /> &nbsp;Remember me</label>
        			<div class="clear"></div>
					<input type="submit" name="submit" value="Login" class="bt_login" />
					<a class="lost-pwd" href="#">Lost your password?</a>
				</form>
			</div>
			<div class="left right">			
				<!-- Register Form -->
				<form action="#" method="post">
					<h1>Not a member yet? Sign Up!</h1>	
					<label class="grey" for="signup">Username:</label>
					<input class="field" type="text" name="signup" id="signup" value="" size="23" />
					<label class="grey" for="email">Password:</label>
					<input class="field" type="text" name="email" id="email" size="23" />
					<label class="grey" for="email">Confirm Password:</label>
					<input class="field" type="text" name="email" id="email" size="23" />
					<input type="submit" name="submit" value="Register" class="bt_register" />
				</form>
			</div>
		</div>
	</div>
 <!-- /login -->	

	<!-- The tab on top -->	
	<div class="tab">
		<ul class="login">
			<li class="left">&nbsp;</li>
			<li>Hello Guest!</li>
			<li class="sep1">|</li>
			<li id="toggle">
				<a id="open" class="open" href="#">Log In | Register</a>
				<a id="close" style="display: none;" class="close" href="#">Close Panel</a>			
			</li>
			<li class="right">&nbsp;</li>
		</ul> 
	</div> <!-- / top -->
	
</div> <!--panel -->
<!-- Login and Register Panel -->
<div id="main_div">
	<div id="header">
		<div id="logo_hd">
				<a href="home4.html" target="_self"><img src="images/logo.png" id="lbay_logo_img" border="0"></a>
		</div>
	</div>
	<!-----------------end of header--------------------------->