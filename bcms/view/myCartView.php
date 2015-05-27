<div id="content_container">
	<div id="sep2_top" style="width:100%;border:0px solid #000000;overflow:auto;margin:0px;background-image:url(images/main_bg2.png);
	background-repeat:repeat-x;min-height:200px;">
		<table width="100%" border="0" align="left" cellpadding="10" cellspacing="0">
			<tr>
				<td valign="top"  height="100px" >
					<h1>YOUR CART DETAILS</h1>
				</td>
				<td width="300px">
					<section>
						<h1>WHAT YOU GET</h1>
						<p>Lifetime access to the online course complete with 65 lectures  </p>
						<p>On demand access to complete the course</p>
						<p>An interactive discussion board where students can connect with the instructor & fellow students</p>
					</section>
				</td>
		 	</tr>
		</table>
	</div>

	<table width="100%" cellpadding="10" cellspacing="5" border="0" >
		<tr>
			<td width="73%" valign="top" align="left">
				<div id="main_cart" style="width:100%;border:1px dotted #000000;float:left;min-height:200px;padding:5px;">
					<div id="wrap_cart" style="background-image:url( ../<?php echo IMAGE_PATH; ?>bg_cart.png);background-color:#EFFAFF;float:left;width:100%;">
						<div id="total_div" style="width:100%;float:left;">
							<!---------------------mycartview start--------------------->
							 
							<!----------------------mycart ui ends------------------------->
						</div>
							
						<!-- COUPON CODE DIV -->
						<div id="redeem_coupon" style="width:45%;float:left;padding:5px;border:2px solid #52B6E3;border-radius:15px;margin-top:5px;margin-bottom:5px;margin-left:5px; background-color:#7BC3E3;background-image:url(../images/bg_coupon.png);">
							<label>Enter Coupon Code</label>&nbsp;&nbsp;<input type="text" name="input_redeem_coupon" size="10" >
							<button id="coupon_btn">Redeem Now!</button><br>	
							<br>
							<label>Coupon Amount</label> : <strong>$45</strong>
						</div>
						<!-- COUPON CODE DIV -->
							
						<div id="redeem_reward" style="width:45%;float:left;float:right;border-radius:15px;border:2px solid #52B6E3;padding:5px;margin-top:5px;margin-bottom:5px;margin-right:5px;background-image:url(../images/bg_coupon.png)">
							<label>Reward Points</label>&nbsp;&nbsp;<input type="text" id="amount" name="input_redeem_rewards" size="5" >&nbsp;<button id="reward_btn">Redeem Now!</button>
							<br>
							<br>
							<label>Reward Amount : </label><strong>$45</strong><div id="slider-range-max" style="width:40%;float:right;margin-right:20px;"></div>
						</div>
						<div id="total_net_amount" style="background-color:#E3E4E4;width:100%;float:left;"> 
							<div id="net_cart_amt1" style="width:58.3%;float:left;padding:5px;"><strong>Total Net Amount</strong></div><div id="course_total_amt1" style="width:20%;float:left;padding:5px;">$45</div>
						</div>
						<div id="" style="float:left;height:30px;padding-top:10px;"><button id="checkout_btn">Checkout</button></div>
					</div>	
				</div>			
			</td>
			<td width="27%" valign="top">
				<section class="section_style1"> 
					<h1>My Wish List</h1>
						<p><ul style="list-style:none;">
							<li><input type="checkbox" name="chkwish1">&nbsp;&nbsp;Course Name 1</li>
							<li><input type="checkbox" name="chkwish1">&nbsp;&nbsp;Course Name 2</li>
							<li><input type="checkbox" name="chkwish1">&nbsp;&nbsp;Course Name 3</li>
							<li><input type="checkbox" name="chkwish1">&nbsp;&nbsp;Course Name 4</li>
							</ul>
						</p>
				</section>
			</td>
		</tr>
	</table>
</div>
	<!--div id="ajax_Cart_display"></div-->
	<!----script src=" <?php //echo JS_PATH."jquery-2.0.3.js"; ?>"></script>
	<!---script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script-->
	
    <script>
		window.onload=disp_ajax();
	
		function disp_ajax()//method to display ui for table
		{ //alert("hello");
			$.ajax({
				type:"GET",
				url:"index.php",
				data:{controller:"myCart",function:"showMyCart"},
				success:function(result)
					{
						//alert("res - " + result);
						$("#total_div").html(result);
						//caltotal();
						//disp_pointsUI();
					
						/*if(p&&c)
						{
							calc_net();						
						}
						else
						{
						alert("aDDC"+p + c);
						}*/
						//
										
					}
				});
				
				
		}

//-----------------------------------------------------------------------------------------------------
		function caltotal()//done
		{	
			//alert("hello");
			var total=0;
			var path = document.getElementsByClassName("Price");
			//alert(document.getElementsByClassName("Price").innerHTML);
			for(var i=0; i<path.length; i++) 
				{
						 total+=Number(path[i].innerHTML);
						 //alert(path[i].innerHTML);
				}
				//alert(total);
			document.getElementById("total").innerHTML=total;
		}
//--------------------------------------------------------------------------------------------------------

		function calc_net()
		{	
		
			//var ttl=Number(document.getElementById("total").innerHTML);
		var ttl= Number($("#total").html());
		//alert(ttl);
			var rwdamt=Number(document.getElementById("rwdpointAmt").innerHTML);
			//rwdamt=Number(document.getElementById("rwdpointAmt").innerHTML);
			//alert(rwdamt);
			var coupamt=Number(document.getElementById("coupAmt").innerHTML);
			var percamnt = (ttl*coupamt)/100;
			
			//alert(ttl+","+rwdamt+","+coupamt);
			var temp=ttl-(rwdamt+percamnt);
			
			document.getElementById("nettot").innerHTML=temp;
		}

//---------------------------------------------------------------------------------------------------
		function edit_cart(cid)
		{
			$.ajax({
				type:"GET",
				url:"index.php",
				data:{controller:"myCart",function:"editMyCart", cid:cid},
				success:function(result)
					{
						//$("#ajax_Cart_display").html(result);
						disp_ajax();
						//calc_net();
						
					}
				});
		}
//-------------------------------------------------------------------------------------------------------------------
		function disp_pointsUI()//TO GET TGE UI FOR REWORS POINT
		{ 
			
			$.ajax({
				type:"GET",
				url:"index.php",
				data:{controller:"rewordPoint",function:"showPointUI"},
				success:function(result)
					{
						$("#reword_point_ui_ajax").html(result);
						disp_couponUI();
					}
				});
			
		}

//------------------------------------------------------------------------------------------------------------------
		function disp_couponUI()// TO GET THE UI FOR Coupon POINT
		{
		//alert("cui");
			$.ajax({
				type:"GET",
				url:"index.php",
				data:{controller:"coupon",function:"showCouponUI"},
				success:function(result)
					{
						$("#coupon_ui_ajax").html(result);
						calc_net();
						
					}
				});
		}
//-------------------------------------------------------------------------------------------------------------------

		function loctocourse()
		{
			window.location="course.php";
		}

//--------------------------------------------------------------------------------------------------------------------------

		function loctopg()
		{
			//window.location="course.php";
		}

		
//-------------------------coupon funcitons----------------
function disp_coupdata()
{
	$('#coupon_ui').show();
	//alert("");
}
//------------------------------------------------------------
function getCDiscount()
{ 	var discount ; 
	var data;
	data=document.getElementById("txtcoup").value;
		
	if (data==null || data=="")
	{
		//alert("empty");
	
	}
	else
	{	
		
		
		var temp = null;
		var detail = new Array();
		var ind = 0;
		var i;
		var dump=null;
		for(i=0; i< data.length; i++)
		{
			var	charc = data.charAt(i);
			var ord = data.charCodeAt(i);
			if(ord > 127)
			{	
				dump += " ";
			}
			else
			{
				if (dump==null)
				{
					dump = charc;
				}
				else
				{
					dump += charc;
					
				}
			}
		}
		//alert(dump);
			
		$.ajax({
					type:"GET",
					url:"index.php",
					data:{controller:"coupon",function:"redeemCoupon",coup:dump},
					success:function(result)
						{
							document.getElementById("coupAmt").innerHTML=result;
							$('#btncoup').hide();
							$('#coupon_ui').hide();
							calc_net();
						}
					});
	}
	
	}

	</script>
 
	<!--br> 
	<!--div id="display_point"></div> &nbsp;&nbsp;  <div id="display_coupon" ></div-> 
	<br> 
    <input type="button" value="Continue to select" onclick="loctocourse()"><input type="button" value="Proceed to Payment" onclick="loctopg()">
	<br/><br/><br/>
	<script>  </script--->
	
