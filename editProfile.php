<?php include "inc/header.php"?>
<?php

 $login = Session::get("customLogin");
 if($login == false){
 	header("location: login.php");
 }
?>
<?php
$cmrId = Session::get("customId");
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
	$cmrUpdate = $cust->customerUpdate($_POST, $cmrId);
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
    	<form action="" method="post">
    		<table class="table table-striped">

    		<?php
    			if(isset($cmrUpdate)){
    				echo"<tr><td colspan='3'><h2>".$cmrUpdate."</h2></td></tr>";
    			}
    	$title = $result['name'];
    		?>
    			<tr>
    				<td colspan="3"><h2>Your profile details</h2></td>
    			</tr>
    			<tr>
    				<td>Name</td>
    				<td></td>
    				<td><input class="form-control" type='text' name='name' value="<?php echo $result['name'];?>"/></td>
    			</tr>
    			<tr>
    				<td>Address</td>
    				<td></td>
    				<td><textarea class="form-control" type='text' name='address'><?php echo $result['address'];?></textarea></td>
    			</tr>
    			<tr>
    				<td>City</td>
    				<td></td>
    				<td><input class="form-control" type='text' name='city' value="<?php echo $result['city'];?>"/></td>
    			</tr>
    			<tr>
    				<td>Country</td>
    				<td></td>
    				<td><input class="form-control" type='text' name='country' value="<?php echo $result['country'];?>"/>
    				</td>
    			</tr>
    			<tr>
    				<td>Phone</td>
    				<td></td>
    				<td><input class="form-control" type='text' name='phone' value="<?php echo $result['phone'];?>"</td>
    			</tr>
    			<tr>
    				<td>Email</td>
    				<td></td>
    				<td><input class="form-control" readonly="readonly" type='text' name='email' value="<?php echo $result['email'];?>"/></td>
    			</tr>
    			<tr>
    				<td>Zip-code</td>
    				<td></td>
    				<td><input class="form-control" type='text' name='zip' value="<?php echo $result['zip'];?>"/></td>
    			</tr>
    			<tr>
    				<td colspan="3"><input class="btn btn-success" type="submit" name="submit" value="save"/></td>
    			</tr>
    		</table>
   
    		
    		</form>
    		<?php } } ?>
    	</div>
    </div>
</div>

<div class="card-body text-center">
	<a href="profile.php" class="btn btn-info text-center">Back<<</a>
</div>

<script>
var name = "<?php echo $title;?>";
    document.title = name+" profile - mrhokar";
  </script>

<?php include "inc/footer.php"?>