<?php include "inc/header.php"?>
<?php

 $login = Session::get("customLogin");
 if($login !== false){
 	header("location: login.php");
 }
?>

<div class="main">
    <div class="content">
    	<div class="section group">
    		<div class="container row">
    <?php
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
  		  $cmrForget = $cust->customerForget($_POST);
  		  if(isset($cmrForget)){
  		  	echo $cmrForget;
  		  }
    }?>
    
   			 	<form method="post" action="" class="form-group">
    				<input name="email" class="form-control" type="email" placeholder="Enter your email here"/>
    				<input name="submit" type="submit" class="btn btn-success mt-2" value="Submit"/>
    			</form>
   
    		</div>
    	
		</div>
    </div>
</div>

<?php include "inc/footer.php"?>