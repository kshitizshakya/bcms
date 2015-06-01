
 <div id="wrapper">
		<table  border="1" cellpadding="3">
		  <tr>
			<th>USER ID</th>
			<th>Enail ID</th>
			<th>Name</th>
			<th>Detail</th>
		  </tr>
        <?php
        if(isset($arrValue) && !empty($arrValue)){ 
          foreach($arrValue as $userList) 
         {
		echo "<tr onmouseover=showDeatilAjax('".$userList['UserId']."')>
			<td>".$userList['UserId']."</td>
			<td>".$userList['UserEmailId']."</td>
			<td>".$userList['UserFirstName']."</td>
			<td><a href='index.php?controller=user&function=detail&id=".$userList['UserId']."'>click here to Veiw Detail</a></td>
		  </tr>";
		
        } 
		} else {
           echo 'Data Not Found';
         } ?>
   </table>
    
   <br/>
   <br/>
   <br/>
   <br/>
   <br/>
   <div id="ajax_replace_div">Mouse over to above data to get display result<div>
 </div>
 
 
<script src="<?php echo JS_PATH?>jquery-2.0.2.js"></script>
 <script>
 function showDeatilAjax(UserId){
      //alert(UserId);
	 
	   $.ajax({
			type: "POST",
			//url: "index.php?controller=user&function=ajaxdetail&id="+UserId,
			url: "index.php?controller=user&function=ajaxdetail&id="+UserId,
			data:"id="+UserId,
			success: function(data) {
				//alert(data);
				//var mb = $('#forgotpasswordMsg2').text(); 
				//alert("Value of div is: " + mb); 
				$('#ajax_replace_div').html(data);
			}
			 
			
		});
	   
        }
</script>		