<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/Customer.php';?>
        <div class="grid_10">
        <?php
        $ct = new Customer();
        $allUser = $ct->getAllUser();
       ?>
            <div class="box round first grid">
                <table class="table">
                	<tr>
                		<td>SL.</td>
                		<td>Name</td>
                		<td>Phone</td>
                		<td>Address</td>
                		<td>City</td>
                	</tr>
                <?php
                $i=0;
                if($allUser){
                	while($result = $allUser->fetch_assoc()){
                	$i++;
              ?>
                	<tr>
                		<td><?php echo $i; ?></td>
                		<td><?php echo $result['name']; ?></td>
                		<td><?php echo $result['phone']; ?></td>
                		<td><?php echo $result['address']; ?></td>
                		<td><?php echo $result['city']; ?></td>
                		
                	</tr>
                	<?php }} ?>
                </table>
            </div>
        </div>
<?php include 'inc/footer.php';?>