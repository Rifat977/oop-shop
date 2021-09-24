

<style>
 
  .swiper-container {
    position:;
    width: 100%;
    height: 100%;
  }
  .swiper-slide {
    text-align: center;
    font-size: 18px;
    background: #fff;

    /* Center slide text vertically */
    display: -webkit-box;
    display: -ms-flexbox;
    display: -webkit-flex;
    display: flex;
    -webkit-box-pack: center;
    -ms-flex-pack: center;
    -webkit-justify-content: center;
    justify-content: center;
    -webkit-box-align: center;
    -ms-flex-align: center;
    -webkit-align-items: center;
    align-items: center;
  }
 .swiper-slide img{
 	width:100%;
 	height:100%;
 }
</style>

<!-- Swiper -->
<div class="swiper-container">
  <div class="swiper-wrapper">
    <div class="swiper-slide"><img src="images/sliderbg3.jpg"></div>
    <div class="swiper-slide"><img src="images/sliderbg4.jpg"></div>
    <div class="swiper-slide"><img src="images/sldr.jpeg"></div>
    <div class="swiper-slide"><img src="images/images19.jpeg"></div>
    <div class="swiper-slide"><img src="images/images20.jpeg"></div>
  </div>
  <!-- Add Pagination -->
  <div class="swiper-pagination"></div>
</div>

<!-- Swiper JS -->
<script src="https://unpkg.com/swiper/js/swiper.js"></script>
  <script src="https://unpkg.com/swiper/js/swiper.min.js"></script>
<script>
  var swiper = new Swiper('.swiper-container', {
    pagination: {
      el: '.swiper-pagination',
      dynamicBullets: true,
    },
  });
</script>



<style>
.abc{
	display:none;
}
</style>
<div class="clear"></div>
<div class="text-center" style="background-color:#f5f5f5">
<div class="clear"></div>
<div class="row">
<table class="table table-responsive">


<tr>
<?php
  $getAllCat = $cat->getAllCat();
   if($getAllCat){
   while($result = $getAllCat->fetch_assoc()){   
   ?>
	      
	      <?php
	      $catId = $result['catId'];
	      $getProByCat = $pd->getProByCat($catId);
	      if($getProByCat){
	      while($resultB = $getProByCat->fetch_assoc()){
	      ?>
	      <td>
				<div class="card " style="width:12rem">
					 <img class="card-img-top" src="admin/<?php echo $resultB['image'];?>" style="height:170px;" alt="" />
					 <div class="card-body">
						 <h2 class="card-title h5"><?php echo $resultB['productName'];?> </h2>					 
						 <p class="card-title h6"><span class="price text-muted"><del>$<?php echo $resultB['delPrice'];?></del></span></p>
						 <p class="h6 card-text"><span class="" style="color:tomato">৳<?php echo $resultB['price'];?></span></p>						 
						 <a href="details.php?proId=<?php echo $resultB['productId'];?>" class="btn text-light" style="background-color:tomato">Add to cart</a>
					 </div>
				</div>
			</td>	
		<?php		}} ?>
			<?php
			}}
			?>
</tr>


		<?php
	/*	$getIphone = $pd->latestIphone();
		if($getIphone){
		while($result = $getIphone->fetch_assoc()){
			$catId = $result['catId'];
			
			$getCatIphone = $pd->getCatIphone($catId);
			if($getCatIphone){
			while($resultB = $getCatIphone->fetch_assoc()){
			
		?>
	 
<tr>
	<td width="13rem" >
	  <div class="card  text-left " style="width:13rem; overflow:hidden">
   <a href="details.php?proId=<?php echo $result['productId'];?>">
			   <img class="card-img-top" src="admin/<?php echo $result['image'];?>" style="height:190px;" alt="Card image cap">
			   </a>
			  	 <div class="card-body">
					   <h5 class="card-title h6 text-dark"><?php echo $result['productName'];?></h5>			   
					   <p class="card-text text-muted"><?php echo $resultB['catName'];?></p>
					   <h6 class="card-title h6 mt-3" style="color:tomato" >৳<?php echo $result['price'];?></h6>
			   
			   
			   <?php }} ?>
			   
			 	  </div>
		   </div>
	</td>
		 	
		   <?php }} ?>
		   
			<?php
			$getSam = $pd->latestSamsung();
			if($getSam){
			while($result = $getSam->fetch_assoc()){
			$catId = $result['catId'];
			
			$getCatSamsung = $pd->getCatSamsung($catId);
			if($getCatSamsung){
			while($resultB = $getCatSamsung->fetch_assoc()){
			
			
			?>
			
	<td width="13rem">		<div class="card text-left" style="width:14rem ;">
<a href="details.php?proId=<?php echo $result['productId'];?>">
			   <img class="card-img-top" src="admin/<?php echo $result['image'];?>" style="height:190px;" alt="Card image cap">
			   <div class="card-body">
			   <h5 class="card-title text-dark h6"><?php echo $result['productName'];?></h5>
			   
			   <p class="card-text text-muted"><?php echo $resultB['catName'];?></p>
			   <h6 class="card-title h6 mt-3" style="color:tomato" >৳<?php echo $result['price'];?></h6>
	</a>		   
			   
			   <?php }} ?>
			   
			   </div>
			   </div>
		 	</td>
		   <?php }} ?>
	
		
						<?php
					$getIphone = $pd->latestCanon();
						if($getIphone){
						while($result = $getIphone->fetch_assoc()){
						$catId = $result['catId'];
						
						$getCatIphone = $pd->getCatCanon($catId);
						if($getCatIphone){
						while($resultB = $getCatIphone->fetch_assoc()){
						
						?>
						
		<td width="13rem">				<div class="card text-left" style="width:14rem">
<a href="details.php?proId=<?php echo $result['productId'];?>">
			   <img class="card-img-top" src="admin/<?php echo $result['image'];?>" style="height:190px;" alt="Card image cap">
			   <div class="card-body">
			   <h5 class="card-title text-dark h6"><?php echo $result['productName'];?></h5>
			   
			   <p class="card-text text-muted"><?php echo $resultB['catName'];?></p>
			   <h6 class="card-title h6 mt-3" style="color:tomato">৳<?php echo $result['price'];?></h6>
	</a>		   
			   
			   <?php }} ?>
			   
			   </div>
			   </div>
		 </td>	
		   <?php }} ?>
		   
			<?php
			$getIphone = $pd->latestAcer();
			if($getIphone){
			while($result = $getIphone->fetch_assoc()){
			$catId = $result['catId'];
			
			$getCatIphone = $pd->getCatHp($catId);
			if($getCatIphone){
			while($resultB = $getCatIphone->fetch_assoc()){
			
			?>
			
<td width="13rem">			<div class="card text-left" style="width:14rem">
<a href="details.php?proId=<?php echo $result['productId'];?>">
			   <img class="card-img-top" src="admin/<?php echo $result['image'];?>" style="height:190px;" alt="Card image cap">
			   <div class="card-body">
			   <h5 class="card-title text-dark h6"><?php echo $result['productName'];?></h5>
			   
			   <p class="card-text text-muted"><?php echo $resultB['catName'];?></p>
			   <h6 class="card-title h6 mt-3" style="color:tomato">৳<?php echo $result['price'];?></h6>
	</a>		   
			   
			   <?php }} ?>
			   
			   </div>
			   </div>
</td>	</tr>	 	
		   <?php }}*/ ?>
	</table>
	</div>
</div>
	
	<div class="" style="background-color:white; padding:20px">
	<p class="text-center">: উপভোগ করুন কুমিল্লার সেরা অনলাইন শপিং অভিজ্ঞতা</p>
	</div>
	
	  <div class="clear"></div>
		 