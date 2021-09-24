
﻿<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include"../classes/Category.php";?>
<?php include_once "../lib/Format.php";?>
<?php include_once "../lib/Database.php";?>
<?php
$fm = new Format();
$db = new Database();
?>
<?php
	if(!isset($_GET['catId']) || $_GET['catId']== NULL){
		echo "<script>window.loction = catlist.php</script>";
	}else{
		$id = $fm->validation($_GET['catId']);
		$id = mysqli_real_escape_string($db->link,$id);
	}
?>
<?php
	$cat = new Category();
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$catName = $_POST['catname'];
		$catUpdate = $cat->catUpdate($catName,$id);
	}
?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Update Category</h2>
            
               <div class="block copyblock"> 
               <span>
               <?php
               if(isset($catUpdate)){
               echo $catUpdate;
               }
               ?>
               </span>
               <?php
              $getCat = $cat->getCatById($id);
              if($getCat){
              	while($results = $getCat->fetch_assoc()){              	          
           
              ?>
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="catname" value="<?php echo $results['catName'];?>" class="medium" />
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