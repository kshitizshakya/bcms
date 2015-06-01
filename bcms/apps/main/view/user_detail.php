
 <div id="wrapper">
 <div><h3>This is User Detail Page</h3></div>
   <div><a href="index.php?controller=user&function=listing">Back To Listing</a></div>
    <div>
	<?php //print_r($arrValue);?>
		  <table width="500" border="1" cellpadding="3">
		  <tr>
			<th>USerID</th>
			<td><?echo $arrValue[0]['UserId'];?></td>
		  </tr>
		  <tr>
			<th>EmailID</th>
			<td><?echo $arrValue[0]['UserEmailId'];?></td>
		  </tr>
		  <tr>
			<th>First Name</th>
			<td><?echo $arrValue[0]['UserFirstName'];?></td>
		  </tr>
		  <tr>
			<th>Last Name</th>
			<td><?echo $arrValue[0]['UserLastName'];?></td>
		  </tr>
		  <tr>
			<th>DOB</th>
			<td><?echo $arrValue[0]['DOB'];?></td>
		  </tr>
		  <tr>
			<th>Address</th>
			<td><?echo $arrValue[0]['Address'];?></td>
		  </tr>
		  <tr>
			<th>Country</th>
			<td><?echo $arrValue[0]['Country'];?></td>
		  </tr>
		</table>
    </div>
 </div>
 