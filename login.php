<?php include"inc/header.php";?>
<script>
document.title= "User login & registration - mrhokar";
</script>

 <div class="main">
    <div class="content">
  <?php
  $login = Session::get("customLogin");
  if($login == true){?>
  	<script>window.location="index.php"</script>
  <?php } ?>

    	 <div class="login_panel ml-2">
    	<?php
    	if($_SERVER['REQUEST_METHOD']== 'POST' && isset($_POST['login'])){
    	$custLogin = $cust->customLog($_POST);
    	}
    	?>
        	<h3>Existing Customers</h3>
        	<?php
        	if(isset($_GET['success'])){
        	echo '<span style="color:green">Password update successfully </span>';
        	}
        	if(isset($custLogin)){
        	echo $custLogin;
        	}
        	?>
        	<p>Sign in with the form below.</p>
        	<form action="" method="post">
                	<input class="form-control" name="email" type="text" placeholder="Email" class="field">
                    <input class="form-control" name="pass" type="password" placeholder="Password" class="field">
                    
                    <p class="note">If you forgot your passoword just enter your email and <a href="forgot.php"class="text-info borderless">Click here</a></p>
                    <div><div><button class="btn text-light" style="background-color:tomato;" name="login">Sign In</button></div></div>
                    </div>
                 </form>
                 
    	<div class="register_account ml-2">
    	<?php
    	if($_SERVER['REQUEST_METHOD']== 'POST' && isset($_POST['submit'])){
    	$customer = $cust->customInsert($_POST);
    	}
    	?>
    	<?php
    
    	if(isset($customer)){
    		echo $customer;
    	}
    	?>
    		<h3>Register New Account</h3>
    		<form action="" method="post">
		   			 <table>
		   				<tbody>
						<tr>
						<td>
							<div>
							<input class="form-control" type="text" style="color:black" name="name" placeholder="Name" >
							</div>
							
							<div>
							   <input class="form-control" type="text" style="color:black" name="city" placeholder="City - (optional)" >
							</div>
							
							<div>
								<input class="form-control" type="text" style="color:black" name="zip" placeholder="Zip-code - (optional)">
							</div>
							<div>
								<input class="form-control" type="text" style="color:black" name="email" placeholder="Email" >
							</div>
		    			 </td>
		    			<td>
						<div>
							<input class="form-control" type="text" style="color:black" name="address" placeholder="Address - (optional)" >
						</div>
		    		<div>
						<input class="form-control" type="text" style="color:black" name="country" placeholder="Country - (optional)">
				 	</div>		        
	
		           <div>
		      	     <input class="form-control" type="text" style="color:black" name="phone" placeholder="Phone" >
		           </div>
				  
				  <div>
				  	<input class="form-control" type="text" style="color:black" name="pass" placeholder="Password" >
				  </div>
		    	</td>
		    </tr> 
		    </tbody></table> 
		   <div class="search"><div><button class="btn text-light" style="background-color:tomato;" name="submit">Create Account</button></div></div>
		    <p class="terms">By clicking 'Create Account' you agree to the <a href="#">Terms &amp; Conditions</a>.</p>
		    <div class="clear"></div>
		    </form>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
</div>
   <?php include"inc/footer.php";?>