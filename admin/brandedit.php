<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include_once "../lib/Format.php";?>
<?php include_once "../lib/Database.php";?>
<?php include"../classes/Brand.php";?>
<?php

$fm = new Format();
$db = new Database();

	if(!isset($_GET['brandId']) || $_GET['brandId']== NULL){
		echo "<script>window.loction = catlist.php</script>";
	}else{
		$id = $fm->validation($_GET['brandId']);
		$id = mysqli_real_escape_string($db->link,$id);
	}
?>
<?php
	$brand = new Brand();
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$brandName = $_POST['brandname'];
		$brandUpdate = $brand->brandUpdate($brandName,$id);
	}
?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Update Brand</h2>
            
               <div class="block copyblock"> 
               <span>
               <?php
               if(isset($brandUpdate)){
               echo $brandUpdate;
               }
               ?>
               </span>
               <?php
              $getbrand = $brand->getBrandById($id);
              if($getbrand){
              	while($results = $getbrand->fetch_assoc()){              	          
           
              ?>
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="brandname" value="<?php echo $results['brandName'];?>" class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
                    <?php
                    }}
                   ?>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>