<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../lib/Format.php';?>
<?php include '../lib/Database.php';?>
<?php
$filep = realpath(dirname(__FILE__));
include $filep."/../classes/Cart.php";
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Customer Details</h2>
                <form class="form-group container mt-5">
   <?php
   $cart = new Cart();
   $fm = new Format();
   $db = new Database();
     if(isset($_GET['custId'])){
     	$Id = $fm->validation($_GET['custId']);
     	$Id = mysqli_real_escape_string($db->link,$Id);
     	$getCustInfo = $cart->getCustInfo($Id);
     }
     if($getCustInfo){
     	while($result = $getCustInfo->fetch_assoc()){
     
   ?>
                	<input class="form-control" type="text" readonly="readonly" value="<?php echo $result['name'];?>" />
                		<input class="form-control mt-2" type="text" readonly="readonly" value="<?php echo $result['city'];?>" />
                			<input class="form-control mt-2" type="text" readonly="readonly" value="<?php echo $result['address'];?>" />
                				<input class="form-control mt-2" type="text" readonly="readonly" value="<?php echo $result['phone'];?>" />
                					<input class="form-control mt-2" type="text" readonly="readonly" value="<?php echo $result['email'];?>" />
                						<input class="form-control mt-2" type="text" readonly="readonly" value="<?php echo $result['zip'];?>" />
                	<a href="inbox.php" class="btn-dark btn-lg mt-2" type="button">Done</a>
       <?php
       }}else{ echo 'Helllo'; }
    
      ?>
                </form>
            </div>
       </div>
<?php include 'inc/footer.php';?>