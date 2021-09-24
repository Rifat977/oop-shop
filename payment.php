<?php include "inc/header.php"?>
<script>
    document.title = "Payment option - mrhokar";
  </script>
<?php
 $login = Session::get("customLogin");
 if($login == false){
 	header("location: login.php");
 }
?>
<div class="main">
    <div class="content">
    	<div class="section group">
    		<h2 class="text-center">Choose payment option</h2><hr>
    		<div class="text-center">
    			<a href="offlinePay.php" class="h3 d-inline-block btn btn-danger text-light p-2" >Offline Payment</a>
        		<a href="onlinePay.php" class="h3 d-inline-block btn btn-danger text-light p-2" >Online Payment</a>
        	</div>
    		<h2 class="text-center text-light mt-5"><a href='cart.php'><p class="text-light btn btn-dark">>>> Previous</p></a></h2>
    	</div>
    </div>
</div>

<?php include "inc/footer.php"?>