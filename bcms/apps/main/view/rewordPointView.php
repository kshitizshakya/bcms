<div id="option_reword_point">
	<table border="1" cellpadding="3" width="100%">
		<tr>
			<td colspan="2">Reword Points</td>
			<td><input type="button" id="" value="Apply Reword Points" onclick="action_pointsUI()"></td>
			<td>
				<div id="rwdpointAmt">
				<?php 
					if(isset($arrValue) && !empty($arrValue))
					{  
						echo $arrValue;
						$_SESSION['discid']=$arrValue;
					}
					else
					{	echo $_SESSION['discid'];	}
				?>
				</div>
			</td>
		</tr>
	</table>	
</div>

<div id="reword_point_ui" style="display:block;">
	
</div>
<script>
function redeempoint()
		{	
			// set points for ruppes as disc val for disc_rs
			var disc_val= 1 ;
	  
			var disc_rs = 1 ;
	 
			var POINTS=$("#amount").val();

			if( POINTS!=0)
			{	
				
				var disc_perc=(disc_rs/disc_val);
				var dAmt = (POINTS*disc_perc);
				var pdata="";

				var avpoint=Number(document.getElementById("avpoint").innerHTML);

				var rwdamt=Number(document.getElementById("rwdpointAmt").innerHTML);
				data=dAmt+"~"+0+"~"+(avpoint-dAmt)+"~"+(rwdamt+dAmt);

			
				$.ajax({
					type:"GET",
					url:"index.php",
					data:{controller:"rewordPoint",function:"redeemePoint",pdata:data},
					success:function(result)
						{
							//$("#display_point").hide();
							$("#display_point").html(result);
							document.getElementById("rwdpointAmt").innerHTML=(rwdamt+dAmt);
							$('#reword_point_ui').hide();
							calc_net();
							
						}
					});
			}
			else
			{	}

		}
function action_pointsUI()
{	var cartcount;
	$.ajax({
				type:"GET",
				url:"index.php",
				data:{controller:"myCart",function:"getCartCount"},
				success:function(result)
					{
						cartcount = Number(result);
							if(cartcount > 0)
							{//alert(cartcount);
								$.ajax({
										type:"GET",
										url:"index.php",
										data:{controller:"rewordPoint",function:"showPointUIAjax"},
										success:function(result)
										{
												$("#reword_point_ui").html(result);
												$("#reword_point_ui").show(result);
												calc_net();
						
										}
	
									});

							
						}

					//alert(cartcount);
				}

		});

			//alert(cartcount);

				
			//$('#reword_point_ui').display("block");
		
}
</script>

