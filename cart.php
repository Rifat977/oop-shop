<?php include"inc/header.php";?>
<script>
    document.title = "Cart list- mrhokar";
  </script>
 <div class="main">
    <div class="content">
    <?php
   if($_SERVER['REQUEST_METHOD']=='POST'){
   		$cartId = $_POST['cartId'];
   		$quantity = $_POST['quantity'];
   		$updateCartQuant =	$cart->updateCartQuant($cartId, $quantity);
   		if($quantity <= 0){
   			$delProductCart = $cart->delProductCart($cartId);
   		}
   }
   if(isset($_GET['delPro'])){
  		$delId = $_GET['delPro'];
  		$delProductCart = $cart->delProductCart($delId);
   }
   ?>
 <?php
 if(!isset($_GET['ibd'])){
 echo "<meta http-equiv='refresh' content='0;URL=?ibd=live'/>";
//header("location: cart.php");
 }
?>
    	<div class="cartoption">		
			<div class="cartpage">
			    	<h2>Your Cart</h2>
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
						<table class="table table-responsive-sm table-bordered">
							<tr style="background:tomato;" class="text-light">
								<th width="5%">SL.</th>
								<th width="20%">Product Name</th>
								<th width="10%">Image</th>
								<th width="15%">Price</th>
								<th width="15%">Quantity</th>
								<th width="10%">Total Price</th>
								<th width="10%">Action</th>
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
								<td><?php echo $i ;?></td>
								<td><?php echo $result['productName'];?></td>
								<td><img src="admin/<?php echo $result['image'];?>" alt=""/></td>
								<td>Tk. <?php echo $result['price'];?></td>
								<td>
									<form action="" method="post">
										<input type="hidden" name="cartId" value="<?php echo $result['cartId'];?>"/>
										<input type="number" name="quantity" value="<?php echo $result['quantity'];?>"/>
										<input type="submit" class="btn btn-light name="submitCart" value="Update"/>
									</form>
								</td>
								<td>Tk.<?php echo $total = $result['quantity']*$result['price'] ?></td>
								<td><a onclick="return confirm('Are you sure to delete?')" href="?delPro=<?php echo $result['cartId'];?>">X</a></td>
							</tr>
							<?php $sum = $sum + $total; 
							Session::set("sum", $sum);
							?>
							<?php
							}}
							?>
							
							
						</table>
						<?php
						$chk = $cart->checkCart();
						if($chk){
						?>
						<table style="float:right;text-align:left;" width="50%">
							<tr>
								<th>Total : </th>
								<td class="border-bottom"> <?php echo $sum ;?>৳</td>
							</tr>
							<tr>
								<th>VAT : </th>
								<td class="border-bottom">40৳</td>
							</tr>
							<tr>
								<th>Grand Total :</th>
								<td class="border-bottom"><?php echo $sum+40;?> ৳</td>
							</tr>
					   </table>
					   <?php
					   }else{
					   echo "Please shop now!";
					   }
					?>
					</div>
					<div class="row">
						<div class="col-12 col-md-6 ml-5">
							<a href="index.php"> <img src="images/shop.png" alt="" /></a>
						</div>
						<div class="col-12 col-md-6">
							<a href="payment.php"> <img src="images/check.png" alt="" /></a>
						</div>
					</div>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
</div>
<?php include"inc/footer.php";?>