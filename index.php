<?php include"inc/header.php";?>
<?php include"inc/slider.php";?>
<script>
document.title= "Mr Hokar | Online Shopping Mall";

</script>
<!-- FlexSlider -->
	  <div class="clear"></div>
  </div>	

 
		<div class="card-header h5" style="color:black; font-weight:100; background-color:#f5f5f5; ">নতুন প্রোডাক্টস :</div>
		<div class="row">
	
		<?php
		$getPd = $pd->getNewPro();
		if($getPd){
		while($result = $getPd->fetch_assoc()){
		$catId = $result['catId'];
	
		$getCatByProducts = $cat->getCatByProducts($catId);
		if($getCatByProducts){
		while($resultB = $getCatByProducts->fetch_assoc()){
		
		
		?>
		<div class="card col-6 col-md-3">
		<a href="details.php?proId=<?php echo $result['productId'];?>">
		<img class="card-img-top" style="height:auto; width:90%;" src="admin/<?php echo $result['image'];?>" alt="" /></a>
		
		<div class="card-body">
		
		<h2 class="card-title h5"><?php echo $result['productName'];?></h2>
		<h2 class="card-title h6 text-muted"><?php  echo $resultB['catName'];?> </h2>
		<?php }} ?>
		
		<p class="card-title h6"><span class="price text-muted"><del>$<?php echo $result['delPrice'];?></del></span></p>
		<p class="card-title h6"><span class="price" style="color:tomato">$<?php echo $result['price'];?></span></p>	
	</div>
		
		</div>
		<?php
		}}
		?>
		</div>
		



 	
    <div class="card-header h5" style="color:black; font-weight:100; background-color:#f5f5f5;">ফিচারড :</div>
    <div class="row">
    
    				<?php
    				$getPd = $pd->getFeaturedPro();
    				if($getPd){
    				while($result = $getPd->fetch_assoc()){
    				$catId = $result['catId'];
    				$count = count($result);
    				
    					$getCatByProducts = $cat->getCatByProducts($catId);
    					if($getCatByProducts){
    					while($resultB = $getCatByProducts->fetch_assoc()){
    					
    	
    				?>
    <div class="card col-6 col-md-3">
    <a href="details.php?proId=<?php echo $result['productId'];?>">
    <img class="card-img-top" style="height:auto; width:90%;" src="admin/<?php echo $result['image'];?>" alt="" /></a>
    
    <div class="card-body">
    
    <h2 class="card-title h5"><?php echo $result['productName'];?></h2>
    <h2 class="card-title h6 text-muted"><?php  echo $resultB['catName'];?> </h2>
    <?php }} ?>
    
    <p class="card-title h6"><span class="price text-muted"><del>$<?php echo $result['delPrice'];?></del></span></p>
    <p class="card-title h6"><span class="price" style="color:tomato">$<?php echo $result['price'];?></span></p>	
    </div>
    
    </div>
    				<?php
    				}}
    				?>
    			</div>
   
	      
	      
	      
		
    		<div class="clear"></div>
   
    	
		
 <?php include"inc/footer.php";?> 