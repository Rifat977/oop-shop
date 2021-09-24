<?php include"inc/header.php";?>
<div class="main">
<script>
document.title= "Order details - mrhokar";
</script>
<?php
	if(isset($_GET['confirm'])){
		$id 	= $_GET['confirm'];
		$time  = $_GET['date'];
	$getConfirm = $cart->getConfirm($id,$time);
	}
?>
    <div class="content">
    	<div class="section-group">
    			<h2 class="text-center">Order Details</h2>
    	<?php
    	if(isset($_GET['confirm'])){
    		echo $getConfirm;
    	}
    	?>
    	<table class="tblone table-responsive-sm">
    		<tr>
    			<th>SL.</th>
    			<th>Product Name</th>
    			<th>Image</th>
    			<th>Quantity</th>
    			<th>Price</th>
    			<th>Date</th>
    			<th>Status</th>
    			<th>Action</th>
    		</tr>
    			<?php
    			$cmrId = Session::get('customId');
    			$getOrder = $cart->getOrderList($cmrId);
    			if($getOrder){
    			$i=0;
    			
    			while($result = $getOrder->fetch_assoc()){
    			$i++;
    			
    			?>
    		<tr>
    			<td><?php echo $i ;?></td>
    			
    			<td><?php echo $result['productName'];?></td>
    			
    			<td><img src="admin/<?php echo $result['image'];?>" alt=""/></td>
    			
    			<td> <?php echo $result['quantity'];?></td>
    			
    			<td>Tk.<?php echo $total = $result['price'] ?></td>
    			<td><?php echo $result['date'];?></td>
    			<td><?php
    			$status = $result['status'];
    				if($status == '0'){
    					echo'Pending';
    				}else{
    					echo'Shifted';
    				}
    			
    			?></td>
    			
    			<td><?php
    				$status = $result['status'];
    				if($status == '0'){
    					echo'N/A';
    				}else if($status == '1'){?>
    					<a href="?confirm=<?php echo $result['cmrId'];?>&date=<?php echo $result['date'];?>">Confirm</a>
    			<?php	}else{ echo 'Done';}
    			?>
    			</td>
    		</tr>
 
    			<?php
    			}}
    			?>
    			
    			
    			</table>
		</div>	    
	</div>
</div>
<?php include"inc/footer.php";?>