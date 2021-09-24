<?php include "inc/header.php"?>
<?php
 $login = Session::get("customLogin");
 if($login == false){
 	header("location: login.php");
 }
?>
<div class="main">
    <div class="content">
    	<div class="section group">
    	<?php
    		$id = Session::get("customId");
    		$getData = $cust->customerData($id);
    		if($getData){
    			while($result = $getData->fetch_assoc()){
    			
    	?>
    		<table class="table table-striped">
				<tr>
					<td colspan="3">Your profile details</td>
					
				</tr>
    			<tr>
    				<td>Name</td>
    				<td></td>
    				<td><?php echo $title =  $result['name'];?></td>
    			</tr>
    			<tr>
    				<td>Address</td>
    				<td></td>
    				<td><?php echo $result['address'];?></td>
    			</tr>
    			<tr>
    				<td>City</td>
    				<td></td>
    				<td><?php echo $result['city'];?></td>
    			</tr>
    			<tr>
    				<td>Country</td>
    				<td></td>
    				<td><?php echo $result['country'];?></td>
    			</tr>
    			<tr>
    				<td>Phone</td>
    				<td></td>
    				<td><?php echo $result['phone'];?></td>
    			</tr>
    			<tr>
    				<td>Email</td>
    				<td></td>
    				<td><?php echo $result['email'];?></td>
    			</tr>
    			<tr>
    				<td>Zip-code</td>
    				<td></td>
    				<td><?php echo $result['zip'];?></td>
    			</tr>
    		</table>
    		
    		<center>
    		<a href="editProfile.php">Edit Profile..</a>
    		</center>
    		
    		<?php } } ?>
    	</div>
    </div>
</div>


<script>
var name = "<?php echo $title;?>";
    document.title = name+" profile - mrhokar";
  </script>
<?php include "inc/footer.php"?>