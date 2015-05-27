<div id="option_coupon">
	<table border="1" cellpadding="3" width="100%" >
		 <tr>
			<td colspan="2"><br> Coupon Amount </td>
			<td> <input type="button" id="btncoup" value="Apply Coupon " onclick="disp_coupdata()"></td>
			<td> <div id="coupAmt">0</div></td>
			
		 </tr>
	</table>	
</div>
<div id="coupon_ui" style="display:none;">
	<table border="1" cellpadding="3">
		<tr>
			<td colspan="3">Enter the coupon code</td>
		</tr>
		<tr>
			<td>Code :</td>
			<td><input type="text" id="txtcoup"></td>
			<td><input type="button" value="OK" onclick="getCDiscount()"></td>
		</tr>
	</table>
</div>

