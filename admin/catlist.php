<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/Category.php';?>
<?php
	$catNew = new Category();
	if(isset($_GET['delete'])){
		$id = $_GET['delete'];
		$catDel = $catNew->delCatById($id);
	}
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Category List</h2>
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
				$getCat = $catNew->getAllCat();
				if($getCat){
				$i=0;
				while($result = $getCat->fetch_assoc()){
					$i++;
			?>
						<tr class="odd gradeX">
							<td><?php echo $i;?></td>
							<td><?php echo $result['catName'];?></td>
							<td><a href="catedit.php?catId=<?php echo $result['catId'];?>">Edit</a> || <a href="?delete=<?php echo $result['catId'];?>" onclick="return confirm('Are you sure?')">Delete</a></td>
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
