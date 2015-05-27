<?php 
		//echo $arrValue;
		if(isset($arrValue) && !empty($arrValue))
		//-if( isset($_REQUEST['avPoint']))
		{ 
        			//$avPoint=$_REQUEST['avPoint'];
?>
	<table  border="1" cellpadding="3" width="100%">
	  	<tr>
			<td colspan="3"> Available Points :  <div id="avpoint"><?php echo $arrValue; ?></div></td>
		</tr>
		<tr >
			<td>
				<div id="slider-points" style="width:100px; .ui-slider-range { background: #ef2929;} .ui-slider-handle { border-color: #ef2929; }"></div>
			</td>
			<td>
				<input type="text" id="amount" style="width:30px;" >
			</td>
		</tr>
		<tr>
			<td colspan="2"><input type="button"  value="Use" onclick="redeempoint()" ></td>
		</tr> 
        <tr>		
			<td colspan="3"><label id="lblhistory_warning">  <label> </td>
		</tr> 
	</table>
<script>
	var maxp = <?php echo $arrValue; ?> ;
	$(function(){
	
		    $("#slider-points").slider({
					range: "min",
					value: 0,
					min: 0,
					max: maxp,
					slide: function( event, ui )
					{
						$( "#amount" ).val(  ui.value );
					}
				});
			$( "#amount" ).val(  $( "#slider-points" ).slider( "value" ));
		});
	$("#amount").keyup(function(){
			if( $("#amount").val() <= maxp )
				{
					$("#slider-points").slider("value",$("#amount").val());
				}
			else
				{	
					$("#amount").val(maxp);
					$("#slider-points").slider("value",maxp);
				}
		 });
</script>
<?php
	}
else{
		echo "No Available Points"; 
	}
?>
