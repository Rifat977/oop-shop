<?php include "inc/header.php"?>
<style>
div a{
	color:black;
}
div a:hover{
	text-decoration: none;
}
</style>
<div class="row justify-content-center">
	<div class="col-8 mt-3 p-2">
		<h3 class="h3 border-bottom border-info text-center">SELL YOUR PRODUCT</h3>
		<form class="form-group" method="post" action=""> 
			<level for="name" class="mt-1">Product name</level>
			<input type="text" class="form-control mt-1" placeholder="product name.."/>

			<level for="price" class="mt-1">Product price</level>
			<input type="text" class="form-control mt-1" placeholder="product price.."/>

				<level for="price" class="mt-1">Prduct image</level>
				  <div class="custom-file mt-1">
				    <input type="file" class="custom-file-input" id="inputGroupFile01"
				      aria-describedby="inputGroupFileAddon01">
				    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
				  </div>

			<level for="price" class="mt-1" >Your area</level>
			<select class="form-control">
				<option>Dhaka</option>
			</select>

			<level for="price" class="mt-1" >Cateagory</level>
			<select class="form-control">
				<option>Mobile</option>
			</select>

			<div class="form-check mt-2">
			  <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
			  <label class="form-check-label" for="exampleRadios1">
			    New Product
			  </label>
			</div>
			<div class="form-check">
			  <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
			  <label class="form-check-label" for="exampleRadios2">
			    Old Product
			  </label>
			</div>
			
			<textarea class="form-control mt-2"></textarea>

			<input type="submit" class="btn btn-info mt-2" value="Post">
		</form>
	</div>
<p class="h5 col-12">Your product list</p>
				<div class="col-12 col-md-6">
					<div class="media p-3 border">
	  						<a href="proInfo.php"><img class="mr-3" src="images/pic1.png" alt="Generic placeholder image">
						  <div class="media-body">
						    <h5 class="mt-0 h5">Product name</h5></a>
						  	<p>Division, category</p>
						  	<p>$5400</p>
						  	<p>Post: 21 february</p>
						  </div>
					</div>
				</div>	

				<div class="col-12 col-md-6">
					<div class="media p-3 border">
	  						<a href="proInfo.php"><img class="mr-3" src="images/pic1.png" alt="Generic placeholder image">
						  <div class="media-body">
						    <h5 class="mt-0 h5">Product name</h5></a>
						  	<p>Division, category</p>
						  	<p>$5400</p>
						  	<p>Post: 21 february</p>
						  </div>
					</div>
				</div>	

</div>
<?php include "inc/footer.php"?>