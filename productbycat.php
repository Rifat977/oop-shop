<?php include"inc/header.php";?>
<?php include"inc/slide.php";?>
<?php
	if(isset($_GET['id'])){
		$id = $_GET['id'];
	}
?>

    		<div class="card-header bg-light">
    		<?php
    	$getct = $cat->getACat($id);
    	if($getct){
    	while($result = $getct->fetch_assoc()){
    	?>
    		<h3 class="card-text h4" style="color:tomato;">Latest from <?php echo $name = $result['catName'];?> >>> </h3>
    	<?php
    	}}
    	?>
    		</div>
    		<div class="clear"></div>
    	</div>
	  <div class="row">
	      <?php
	      	$getPd = $pd->getAllProByCat($id);
	      	if($getPd){
	      		while($result = $getPd->fetch_assoc()){
	     ?>
				<div class="col-6 col-md-3 card">
					 <a href="details.php?proId=<?php echo $result['productId'];?>"><img class="card-img-top" style="height:180px; width:300px;" src="admin/<?php echo $result['image'];?>" alt="" /></a>
				 <div class="card-body">
					 <h2 class="card-title h4"><?php echo  $result['productName'];?></h2>
					 <p></p>
					 <p><span class="price" style="color:tomato">৳<?php echo $result['price'];?></span></p>
				     	<div class="btn text-light mt-3" style="background-color:tomato;"><span><a href="details.php?proId=<?php echo $result['productId'];?>" class="details text-light">Details</a></span></div>
				   </div>
				     	</div>
				<?php

				}}else{echo'Sorry there is no category';}
				?>
	</div>
	
	<script>
	var name = "<?php echo $name; ?>";
	document.title= name+' category'+" - mrhokar";
	</script>
	
   <?php include"inc/footer.php";?>