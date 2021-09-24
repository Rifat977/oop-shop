<?php include"inc/header.php";?>
<div class="text-center">
<h2>Products</h2>
</div>
<?php //include"inc/slide.php";?>
 
   <?php
   $getAllCat = $cat->getAllCat();
   if($getAllCat){
   while($result = $getAllCat->fetch_assoc()){
   
   ?>
    
    		<div class="card-header bg-light">
    
    		<h3 class="h4 " style="color:tomato"><?php echo $result['catName'];?> >>></h3>
    		</div>
    		<div class="clear"></div>
  
     <div class="row">
	      
	      <?php
	      $catId = $result['catId'];
	      $getProByCat = $pd->getProByCat($catId);
	      if($getProByCat){
	      while($resultB = $getProByCat->fetch_assoc()){
	      
	      ?>
	      
				<div class="card col-6 col-md-3">
					 <img class="card-img-top" src="admin/<?php echo $resultB['image'];?>" alt="" />
					 <div class="card-body">
						 <h2 class="card-title h5"><?php echo $resultB['productName'];?> </h2>
						 
						 <p class="card-title h6"><span class="price text-muted"><del>$<?php echo $resultB['delPrice'];?></del></span></p>
						 <p class="h6 card-text"><span class="" style="color:tomato">৳<?php echo $resultB['price'];?></span></p>
						 
						 <a href="details.php?proId=<?php echo $resultB['productId'];?>" class="btn text-light" style="background-color:tomato">Add to cart</a>
					 </div>
				     </div>
		<?php		}} ?>
		</div>	
			<?php
			}}
			?>
  <script>
    document.title = "Product list of - mrhokar";
  </script>

<?php include"inc/footer.php";?>