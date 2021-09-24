<?php include "inc/header.php"?>



<div class="row">
	      
	      <?php
	   if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['sub'])){
	   $getSearch = $pd->getSearch($_POST);
	   
	  
	      if($getSearch){
	      while($result = $getSearch->fetch_assoc()){
	      
	      ?>
	      
				<div class="card col-6 col-md-3">
					 <img class="card-img-top" src="admin/<?php echo $result['image'];?>" alt="" />
					 <div class="card-body">
						 <h2 class="card-title h5"><?php echo $result['productName'];?> </h2>
						 <p class="h6 card-text mt-3"><span class="">৳<?php echo $result['price'];?></span></p>
						 <a href="details.php?proId=<?php echo $result['productId'];?>" class="btn btn-info">Details</a>
					 </div>
				     </div>
		<?php		}} }else{
		header("location: index.php");
		}?>
		</div>	

<?php include "inc/footer.php"?>