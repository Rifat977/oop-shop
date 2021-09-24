<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php
$filep = realpath(dirname(__FILE__));
include $filep."/../classes/Cart.php";
$cart = new Cart();
?>
<?php
/*
if(isset($_GET['info'])){
		$info 	= $_GET['info'];

	$getInfo = $cart->getInfo($info);
	}
	*/
	if(isset($_GET['shiftid'])){
		$id 	= $_GET['shiftid'];
		//$price  = $_GET['price'];
		$time  = $_GET['date'];
	$getShift = $cart->getShift($id,$time);
	}
	if(isset($_GET['delProId'])){
		$id 	= $_GET['delProId'];
	
		$time  = $_GET['date'];
	$getDelPro = $cart->getDelPro($id,$time);
	}
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Inbox</h2>
               <?php
            if(isset($getShift)){
            	echo $getShift;
            }
              ?>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Item</th>
							<th>Order Date</th>
							<th>Product</th>
							<th>Quantity</th>
							<th>Price</th>
							<th>Cust. Id</th>
							<th>Address</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php
					
						$getAllOrder = $cart->getAllOrder();
							if($getAllOrder){
								while($result = $getAllOrder->fetch_assoc()){
								
					?>
						<tr class="even gradeC">
							<td><a href="../details.php?proId=<?php echo $result['productId'];?>">Info</a></td>
							<td><?php
							 //date_default_timezone_set("Asia/Dhaka");
							  echo $cart->formatDate($result['date']);
							   
							   ?></td>
							<td><?php echo $result['productName'];?></td>
							<td><?php echo $result['quantity'];?></td>
							<td><?php echo $result['price'];?></td>
							<td><?php echo $result['cmrId'];?></td>
							<td><a href="customer.php?custId=<?php echo $result['cmrId'];?>">View Details</a></td>
							<?php $status = $result['status'];
								if($status == '0'){ ?>
							<td class="btn-success text-center"><a href="?shiftid=<?php echo $result['cmrId'];?>&date=<?php echo $result['date'];?>">Shifted</a></td>
								<?php }else if($status == '1'){ ?>
							<td>Pending</td>
							<?php	}else{ ?>
							<td><a href="?delProId=<?php echo $result['cmrId'];?>&date=<?php echo $result['date'];?>">Remove</a></td>
							
								<?php } ?>
						</tr>
					<?php
					}}
					?>
					</tbody>
				</table>
               </div>
            </div>
        </div>
<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();

        $('.datatable').dataTable();
        setSidebarHeight();
    });
</script>
<?php include 'inc/footer.php';?>