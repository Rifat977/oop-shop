<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/Brand.php';?>
<?php include_once "../lib/Format.php";?>
<?php include_once "../lib/Database.php";?>
<?php
$fm = new Format();
$db = new Database();
?>
<?php
	$brand = new Brand();
	if(isset($_GET['delete'])){
		$id = $fm->validation($_GET['delete']);
		$id = mysqli_real_escape_string($db->link,$id);
		$brandDel = $brand->delBrandById($id);
	}
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Brand List</h2>
               <?php
                if(isset($catDel)){
                echo $catDel;
                }
               ?>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Category Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
			<?php
				$getBrand = $brand->getAllBrand();
				if($getBrand){
				$i=0;
				while($result = $getBrand->fetch_assoc()){
					$i++;
			?>
						<tr class="odd gradeX">
							<td><?php echo $i;?></td>
							<td><?php echo $result['brandName'];?></td>
							<td><a href="brandedit.php?brandId=<?php echo $result['brandId'];?>">Edit</a> || <a href="?delete=<?php echo $result['brandId'];?>" onclick="return confirm('Are you sure?')">Delete</a></td>
						</tr>
			<?php
			} }
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