<?php include "inc/header.php"?>
<script>
document.title= "Offline payment - mrhokar";
</script>
<?php
 $login = Session::get("customLogin");
 if($login == false){
 	header("location: login.php");
 }
 $qty =0;
?>
<?php
	if(isset($_GET['cmrorder']) && $_GET['cmrorder']=='order'){
		$cmrId = Session::get('customId');
		$customerOrder = $cart->customerOrder($cmrId);
		$delCart = $cart->delCustCart();?>
		<script>window.location= "success.php"</script>
 <?php	}
?>
<div class="main">
    <div class="content">
    	<div class="section group">
    		<div class="row">
    		
    		<div class="cartoption">		
    		<div class="cartpage">
    		<span>
    		<?php
    		if(isset($updateCartQuant)){
    		echo $updateCartQuant;
    		}
    		if(isset($delProductCart)){
    		echo $delProductCart;
    		}
    		
    		?>
    		</span>
    		<table class="tblone table-responsive-sm">
    		<tr>
    		<th class="bg-dark ">Product Name</th>
    		<th class="bg-dark">Price</th>
    		<th class="bg-dark">Quantity</th>
    		<th class="bg-dark">Total Price</th>
    		</tr>
    		<?php
    		$getCart = $cart->getCartList();
    		$sum=0;
    		if($getCart){
    		$i=0;
    		
    		while($result = $getCart->fetch_assoc()){
    		$i++;
    		
    		?>
    		<tr>
    	
    		<td><?php echo $result['productName'];?></td>
    		
    		<td>Tk. <?php echo $result['price'];?></td>
    		<td><?php echo $result['quantity'];?></td>
    		<td>Tk.<?php echo $total = $result['quantity']*$result['price'] ?></td>
    		</tr>
    		<?php 
    		$sum = $sum + $total; 
    		Session::set("sum", $sum);
    		?>
    		<?php
    		
    		$qty = $qty + $result['quantity'];
    		?>
    		<?php
    		}}
    		?>
    		
    		
    		</table>
    		<?php
    		$chk = $cart->checkCart();
    		if($chk){
    		?>
    		<table class="mr-2" style="float:right;text-align:left;; padding:20px;" width="60%">
    		<tr>
    		<td>Sub Total </td>
    		<td>:</td>
    		<td class="border-bottom" ><?php echo  $sum ;?>TK.</td>
    		</tr>
    		<tr>
    		<th>VAT</th>
    		<td>:</td>
    		<td class="border-bottom">10% ($<?php echo $vat = $sum * 0.1; ?>)</td>
    		</tr>
    		<tr>
    		<th>Grand Total</th>
    		<td>:</td>
    		<td class="border-bottom"> <?php echo $sum + $vat; ?> TK.</td>
    		</tr>
    		<tr>
    		<th>Item</th>
    		<td>:</td>
    		<td class="border-bottom"> <?php echo $qty; ?></td>
    		</tr>
    		</table>
    		<?php
    		}else{
    		echo "Please shop now!";
    		
    		}
    		?>
    		</div>
    		</div>
    		
    		
    		<div>
    	<?php
    		$id = Session::get("customId");
    		$getData = $cust->customerData($id);
    		if($getData){
    			while($result = $getData->fetch_assoc()){
    			
    	?>
    		<table class="table ml-3 table-striped">
				<tr>
					<td colspan="3">Your profile details</td>
					
				</tr>
    			<tr>
    				<td>Name</td>
    				<td width="5%"></td>
    				<td><?php echo $result['name'];?></td>
    			</tr>
    			<tr>
    				<td>Address</td>
    				<td width="5%"></td>
    				<td><?php echo $result['address'];?></td>
    			</tr>
    			<tr>
    				<td>City</td>
    				<td width="5%"></td>
    				<td><?php echo $result['city'];?></td>
    			</tr>
    			<tr>
    				<td>Country</td>
    				<td width="5%"></td>
    				<td><?php echo $result['country'];?></td>
    			</tr>
    			<tr>
    				<td>Phone</td>
    				<td width="5%"></td>
    				<td><?php echo $result['phone'];?></td>
    			</tr>
    			<tr>
    				<td>Email</td>
    				<td width="5%"></td>
    				<td><?php echo $result['email'];?></td>
    			</tr>
    			<tr>
    				<td>Zip-code</td>
    				<td width="5%"></td>
    				<td><?php echo $result['zip'];?></td>
    			</tr>
    		</table>
    		
    		<center>
    		<a href="editProfile.php">Edit Profile..</a>
    		</center>
    		
    		<?php } } ?>
    	</div>
   	 </div>
   	 		<center>
   	 		<?php
   	 		if(Session::get("sum")!=0){
   	 		?>
   				 <a href="?cmrorder=order" class="btn btn-danger mt-5">Order Now</a>
   			 </center>
   			 <?php
   			 }
   			?>
    </div>
   </div> 
</div>

<?php include "inc/footer.php"?>