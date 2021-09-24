<?php include"inc/header.php";?>
<?php
$id = Session::get("customId");
$customer = $cust->customerData($id);
if($customer){
	while($result = $customer->fetch_assoc()){
		$name = $result['name'];


if(isset($_POST['cmntSub'])){
	$cmnt = $_POST['cmnt'];
	$proId = $_POST['proId'];
	$cmntl = strlen($cmnt);
	if($cmntl > 100){
	header("location: index.php?error1");
	}else{
	$comment = $pd->comment($cmnt,$proId,$name);
	}
}

}
}

?>

 <div class="row justify-content-center mt-2">
								<?php
								if(isset($_GET['proId'])){
								$id = mysqli_real_escape_string($db->link,$_GET['proId']);
								}
				if(isset($_POST['quantity'])){
					$quantity = $_POST['quantity'];
					$addCart = $cart->addCart($quantity, $id);
				}
								$getPd = $pd->getSingleProduct($id);
								if($getPd){
									while($result = $getPd->fetch_assoc()){
$productId = $result['productId'];
								?>
								
								
	  			<div class="col-10 col-md-4">
						<img src="admin/<?php echo $result['image'];?>" class="img-fluid" alt="" />
				</div>
				
				<div class="col-10 col-md-4">
					<h2 class="h3 text-center mt-3" style="color:#000000; border-bottom:2px solid tomato;"><?php echo $name =  $result['productName'];?></h2>
						<table class="price mt-5">
						<tr>
							<td>Price </td>
							<td>: </td>
							<td><p> <span style="color:tomato;" > ৳<?php echo $result['price'];?></span></p></td>
						</tr>
						
						<tr>
							<td>Category </td>
							<td>: </td>
							<td><p> <span style="color:tomato;"> <?php echo $result['catName'];?></span></p></td>
						</tr>
						
						<tr>
							<td>Brand </td>
							<td>: </td>
							<td><p><span style="color:tomato;"><?php echo $brand = $result['brandName'];?></span></p></td>
						</tr>
					
					</table>

	<div class="add-cart">
			<?php
			$login = Session::get("customLogin");
			if($login == true){ ?>
					<form action="" method="post">
						<input type="number" class="buyfield" name="quantity" value="1" required/>
						<button class="btn mt-2 text-light" style="background-color:tomato;" name="submit"><i class="fa fa-shopping-cart"></i> Buy Now</button>
					</form>	
			<?php } ?>
			<span style="color:red; font-size:20px;">
			<?php
			if(isset($addCart)){
			echo $addCart;
			}
			?>
			</span>
	</div>
</div>
			
		<div class="col-10 col-md-4 mt-3">
			<h1 class="h3" style="color:">Product Details: </h1>
			<?php echo $result['body'];?>
		</div>
		<?php
		}}
		?>		
</div>		
		
		
		
	<div class="col-10">
	<hr>	<h2 style="color:tomato;">ক্যাটাগরি >>></h2>
	<ul>
	<?php
	$getCate = $cat->getAllCat();
	if($getCate){
	while($result = $getCate->fetch_assoc()){
	?>
	<li><a style="font-family:'sans-serif';" href="productbycat.php?id=<?php echo $result['catId'];?>"><?php echo $result['catName'];?></a></li>
	<?php
	
	}
	}
	?><hr>
	</ul>			
	</div>
	<div class="col-10">
<?php
$cmnt = $pd->comments($productId);
if($cmnt){
	while($result = $cmnt->fetch_assoc()){
?>
	<p class="ml-2 mt-2 " style="font-weight:bold"> <span class="fa fa-user"></span> <?php echo $result['name'];?>:
		<p class="ml-3"><?php echo $result['comment'];?> </p>
	</p>
<?php }} ?>
<?php
$login = Session::get("customLogin");
if($login == true){
?>	
	<form action="" method="post">
	<input type="hidden" name="proId" value="<?php echo $productId; ?>">
	<textarea class="ml-2 mt-3" type="text" name="cmnt" placeholder="comment here"></textarea><br>
	<input type="submit" class="btn text-light ml-2 mb-2" style="background:tomato" name="cmntSub">
	</form>
<?php } ?>	
	</div>
<script>
	var pdname = "<?php echo $name;?>";
	var brand = "<?php echo $brand;?>";
	document.title = pdname+' from '+brand+' brand'+' - mrhokar';
</script>
   <?php include"inc/footer.php";?>