<?php include"inc/header.php";?>

<div class="text-center">
<h2>Top Brands</h2>
</div>
<?php
   $getAllTopBrand = $bd->getAllTopBrand();
   if($getAllTopBrand){
   while($result = $getAllTopBrand->fetch_assoc()){
   
   ?>
    
    		<div class="card-header" style="background-color:#fff; !important" >
    
    		<h3 class=" h4" style="color:tomato;"><?php echo $result['brandName'];?> >>></h3>
    		
    		</div>
    		<div class="clear"></div>
  
     <div class="row" "background-color:#fff; !important">
	      
	      <?php
	      $bdId = $result['brandId'];
	      $getProByBd = $bd->getProByBd($bdId);
	      if($getProByBd){
	      while($resultB = $getProByBd->fetch_assoc()){
	      
	      ?>
	      
				<div class="card col-6 col-md-3">
					 <img class="card-img-top" style="height:auto" src="admin/<?php echo $resultB['image'];?>" alt="" />
					 <div class="card-body">
						 <h2 class="card-title h5"><?php echo $resultB['productName'];?> </h2>
						 
						 <p class="card-title h6"><span class="price text-muted"><del>$<?php echo $resultB['delPrice'];?></del></span></p>
						 <p class="h6 card-text"><span class="" style="color:tomato;">৳<?php echo $resultB['price'];?></span></p>
						 <a href="details.php?proId=<?php echo $resultB['productId'];?>" class="btn text-light" style="background-color:tomato;">Details</a>
					 </div>
				     </div>
		<?php		}} ?>
		</div>	
			<?php
			}}
			?>





<script>
    document.title = "Top brand products - mrhokar";
  </script>
 
<?php include"inc/footer.php";?>