<div id="data_title" style="float:left;height:30px;width:100%;background-color:#2E7C9F;color:#ffffff;font-weight:bold;padding-top:10px;">
	
	<div style="float:left;width:10%;">&nbsp;&nbsp;Sr. No.</div>
	<div style="float:left;width:50%;">Course Name</div>
	<div style="float:left;width:15%;">Course Price</div>
	<div style="float:left;width:25%;text-align:right;">
		<input type="checkbox" name="selectall">&nbsp;&nbsp;Select to Remove&nbsp;&nbsp;
	</div>
</div>

	<?php
        if(isset($arrValue) && !empty($arrValue))
		{ 
      		
		  foreach($arrValue as $k => $cartList) 
			 {	
			 echo '<div id="data_cart1" draggable="true" style="float:left;padding:5px;width:98.7%;border:0px solid #000000;">
					<input type="hidden" name="courseid" value="'.$cartList["CourseId"].'"/>	
					<div style="float:left;width:10%;">1.</div>
					<div style="float:left;width:50%;">'.$cartList["fullName"].'</div>
					<div  class="Price" style="float:left;width:15%;">'. $cartList["Price"] .'</div>
					<div style="float:left;width:25%;text-align:right;">
					<input type="checkbox" name="courechk" checked="checked" onclick="edit_cart('.$cartList['CourseId'].')">
					</div>
					</div>';
			 
			 }
		}
		else 
		{
           echo '<div id="data_cart1" draggable="true" style="float:left;padding:5px;width:98.7%;border:0px solid #000000;"><strong> Cart Empty</strong> </div>';
		} 
	?>
			 
<div id="total_box" style="background-color:#E3E4E4;width:99.8%;float:left;"> 
	<div id="net_cart_amt" style="float:left;padding:5px;border:0px solid #000000;width:58.3%;">
		<strong>Total Amount</strong>
	</div>
	<div id="course_total_amt" style="float:left;padding:5px;width:10%;border:0px solid #000000;">0</div>
</div>