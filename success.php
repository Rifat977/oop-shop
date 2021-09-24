<?php include "inc/header.php"?>
<?php
 $login = Session::get("customLogin");
 if($login == false){
 	header("location: login.php");
 }
?>
<div class="main">
    <div class="content">
    	<div class="section group">
    		<h2 class="text-center">Success</h2><hr>
    		<div class="container">
    		<?php
    			$cmrId = Session::get('customId');
    			$getPrice = $cart->payableAmount($cmrId);
    			if($getPrice){
    			$sum = 0;
    				while($result = $getPrice->fetch_assoc()){
    			$sum = $sum + $result['price'];
    			
    		?>
    			<p class="h6">Total Payable amount (Including Vat):
    			 <?php echo $sum*0.1+$sum;
    				
    	}}		?></p>
    
    			<p>Thanks for phurchase.We recived your order successfully.We will contact your ASAP with delivery details. Here is your delivery details..<a href="orderdetails.php">Visit here</p>
  			</a>
  		</div>
    </div>
</div>

<?php include "inc/footer.php"?>