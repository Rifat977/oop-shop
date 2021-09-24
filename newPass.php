<?php include "inc/header.php"?>
<?php

 $login = Session::get("customLogin");
 if($login !== false){
 	header("location: login.php");
 }
?>
<?php
if(isset($_GET['base'])){
	 $email = $fm->validation(base64_decode($_GET['base']));
	 $email = mysqli_real_escape_string($db->link,$email);
	 $cmrSelect = $cust->cmrSelect($email);
}
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])){
  		  $cmrPassUpdate = $cust->cmrPassUpdate($_POST);
    } 
?>

<div class="main">
    <div class="content">
    	<div class="section group">
    <?php
    if(isset($cmrPassUpdate)){
    	echo $cmrPassUpdate;
    }
   ?>
    		<div class="container row">
    <?php
    	while($result = $cmrSelect->fetch_assoc()){?>
    	<form method="post" action="" class="form-group">
   		 	<input name="rand" class="form-control" type="text" value="<?php echo $result['rand'];?>"/>
   		 	<input name="token" class="form-control" type="hidden" value="<?php echo $result['rand'];?>"/>
   		 	<input name="email" class="form-control" type="hidden" value="<?php echo $result['email'];?>"/>
   		 	<input name="pass" class="form-control mt-2" type="password" placeholder="New Password"/>
   		 	<input name="passTwo" class="form-control mt-2" type="password" placeholder="Confirm Password"/>
    		<input name="update" type="submit" class="btn btn-success mt-2" value="Submit"/>
    	</form>
<?php  } 
    ?>
   			 

    		</div>
    	
		</div>
    </div>
</div>

<?php include "inc/footer.php"?>