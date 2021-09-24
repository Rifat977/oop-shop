<?php
$filep = realpath(dirname(__FILE__));
include_once $filep."/../lib/Database.php";
include_once $filep."/../lib/Format.php";
class Product{
	private $db;
	private $fm;
	
	public function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
	}
	public function productInsert($data,$file){
		$productName = $this->fm->validation($data['productName']);
		$productName = mysqli_real_escape_string($this->db->link,$productName);
		$catId = $this->fm->validation($data['catId']);
		$catId = mysqli_real_escape_string($this->db->link,$catId);
		$brandId = $this->fm->validation($data['brandId']);
		$brandId = mysqli_real_escape_string($this->db->link,$brandId);
		$body = $this->fm->validation($data['body']);
		$body = mysqli_real_escape_string($this->db->link,$body);
		$body = substr($body,9);
		$price = $this->fm->validation($data['price']);
		$price = mysqli_real_escape_string($this->db->link,$price);
		$type = $this->fm->validation($data['type']);
		$type = mysqli_real_escape_string($this->db->link,$type);
		
		$ext = array('jpg','jpeg','png','gif');
		$file_name = $file['image']['name'];
		$file_size = $file['image']['size'];
		$file_tmp = $file['image']['tmp_name'];		
		
		$div = explode('.',$file_name);
		$file_ext = strtolower(end($div));
		$uniqe_name = substr(md5(time()),0,10).'.'.$file_ext;
		$upload_image = "upload/".$uniqe_name;
	
		if($productName == "" || $catId == "" || $brandId == "" || $body == "" || $price == "" || $type == "" || $file_name == ""){
			$msg = "Feild must not be empty!";
			return $msg;
		}elseif($file_size > 1048567){
			$msg ="File size too large!";
		}else{
			move_uploaded_file($file_tmp,$upload_image);
			$query = "INSERT INTO tbl_product(productName,catId,brandId,body,price,image,type) VALUES('$productName','$catId','$brandId','$body','$price','$upload_image','$type')";
			$insert_row = $this->db->insert($query);
				if($insert_row){
					$msg = "Data upload seccessfully!";
					return $msg;
				}else{
					$msg = "Data not upload!";
					return $msg;
				}
		}
		
	}
	public function getProductList(){
		$query = "SELECT tbl_product.*, tbl_category.catName, tbl_brand.brandName
				 FROM tbl_product
				 INNER JOIN tbl_category
				 ON tbl_product.catId = tbl_category.catId
				 INNER JOIN tbl_brand
				 ON tbl_product.brandId = tbl_brand.brandId
				 ORDER BY tbl_product.productId DESC";
		$result = $this->db->select($query);
		return $result;
	}
	public function getProById($id){
		$query = "SELECT * FROM tbl_product WHERE productId ='$id'";
		$result = $this->db->select($query);
		return $result;
	}
	
	public function updateProduct($data,$file,$id){
		$productName = $this->fm->validation($data['productName']);
		$productName = mysqli_real_escape_string($this->db->link,$productName);
		$catId = $this->fm->validation($data['catId']);
		$catId = mysqli_real_escape_string($this->db->link,$catId);
		$brandId = $this->fm->validation($data['brandId']);
		$brandId = mysqli_real_escape_string($this->db->link,$brandId);
		$body = $this->fm->validation($data['body']);
		$body = mysqli_real_escape_string($this->db->link,$body);
		//$body = substr($body,2);
		$price = $this->fm->validation($data['price']);
		$price = mysqli_real_escape_string($this->db->link,$price);
		
		$delPrice = $this->fm->validation($data['delprice']);
		$delPrice = mysqli_real_escape_string($this->db->link,$delPrice);
		
		$type = $this->fm->validation($data['type']);
		$type = mysqli_real_escape_string($this->db->link,$type);
		
		$ext = array('jpg','jpeg','png','gif');
		$file_name = $file['image']['name'];
		$file_size = $file['image']['size'];
		$file_tmp = $file['image']['tmp_name'];		
		
		$div = explode('.',$file_name);
		$file_ext = strtolower(end($div));
		$uniqe_name = substr(md5(time()),0,10).'.'.$file_ext;
		$upload_image = "upload/".$uniqe_name;
		
		if($productName == "" || $catId == "" || $brandId == "" || $body == "" || $price =="" || $type == ""){
			$msg = "Feild must not be empty!";
			return $msg;
		}elseif($file_size > 1048567){
			$msg ="File size too large!";
		}else{
			if(!empty($file_name)){
				move_uploaded_file($file_tmp,$upload_image);
					$query = "UPDATE tbl_product SET
					productName = '$productName',
					catId 		= '$catId',
					brandId		= '$brandId',
					body		= '$body',
					price		= '$price',
					delPrice	= '$delPrice',			
					image		= '$upload_image',
					type		= '$type'
					WHERE productId = '$id'";
					$update_row = $this->db->update($query);
					if($update_row){
					$msg = "Data update seccessfully!";
					return $msg;
				}else{
					$msg = "Data not updated!";
				return $msg;
				}
			}else{
				
				$query = "UPDATE tbl_product SET
						productName = '$productName',
						catId 		= '$catId',
						brandId		= '$brandId',
						body		= '$body',
						price		= '$price',
						delPrice   	= '$delPrice',
						type		= '$type'
						WHERE productId = '$id'";
				$update_row = $this->db->update($query);
				if($update_row){
					$msg = "Data update seccessfully!";
					return $msg;
				}else{
					$msg = "Data not update!";
				return $msg;
				}
			}
			
			
		
		}
	}
	public function delProById($id){
	
	$delQuery = "SELECT * FROM tbl_product WHERE productId = '$id'";
	$delQ = $this->db->select($delQuery);
	if($delQ){
		while($del = $delQ->fetch_assoc()){
			$delImg = $del['image'];
			unlink($delImg);
		}
	}
	
		$query = "DELETE FROM tbl_product WHERE productId = '$id'";
		$result = $this->db->delete($query);
		if($result){
			$msg = "Data deleted Successfully!!";
			return $msg;
		}else{
			$msg = "Data deleted Failed!!";
			return $msg;
		}
	}
	public function getFeaturedPro(){
		$query ="SELECT * FROM tbl_product WHERE type='0' ORDER BY productId DESC LIMIT 4";
		$result = $this->db->select($query);
		return $result;
	}
	public function getNewPro(){
		$query ="SELECT * FROM tbl_product ORDER BY productId DESC LIMIT 4";
	$result = $this->db->select($query);
	return $result;
	}
	
	public function getSingleProduct($id){
	$query = "SELECT p.*, c.catName, b.brandName
			  FROM tbl_product as p, tbl_category as c, tbl_brand as b
			  WHERE p.catId = c.catId AND p.brandId = b.brandId AND p.productId = '$id'";
	
	
	/*"SELECT tbl_product.*, tbl_category.catName, tbl_brand.brandName
		FROM tbl_product
		INNER JOIN tbl_category
		ON tbl_product.catId = tbl_category.catId
		INNER JOIN tbl_brand
		ON tbl_product.brandId = tbl_brand.brandId
		WHERE productId = '$id'
		ORDER BY tbl_product.productId DESC";
		*/
	$result = $this->db->select($query);
	return $result;
	}
	public function latestIphone(){
		$query = "SELECT * FROM tbl_product WHERE brandId = '1' ORDER BY productId DESC LIMIT 1";
		$result = $this->db->select($query);
		return $result;
	}
	public function latestSamsung(){
		$query = "SELECT * FROM tbl_product WHERE brandId = '7' ORDER BY productId DESC LIMIT 1";
		$result = $this->db->select($query);
		return $result;
	}
	public function latestAcer(){
		$query = "SELECT * FROM tbl_product WHERE brandId = '2' ORDER BY productId DESC LIMIT 1";
		$result = $this->db->select($query);
		return $result;
	}
	public function latestCanon(){
		$query = "SELECT * FROM tbl_product WHERE brandId = '4' ORDER BY productId DESC LIMIT 1";
		$result = $this->db->select($query);
		return $result;
	}
	public function getAllProByCat($id){
		$id = mysqli_real_escape_string($this->db->link,$id);
		$query = "SELECT * FROM tbl_product WHERE catId ='$id'";
		$result = $this->db->select($query);
		return $result;
	}
	public function getProByCat($catId){
		$query = "SELECT * FROM tbl_product WHERE catId = '$catId'";
		$result = $this->db->select($query);
		return $result;
	}
	public function getCatIphone($catId){
		$query = "SELECT * FROM tbl_product LIMIT 10";
		$result = $this->db->select($query);
		return $result;
	}
	public function getCatSamsung($catId){
		$query = "SELECT * FROM tbl_category WHERE catId = '$catId'";
		$result = $this->db->select($query);
		return $result;
	}
	public function getCatCanon($catId){
		$query = "SELECT * FROM tbl_category WHERE catId = '$catId'";
		$result = $this->db->select($query);
		return $result;
	}
	public function getCatHp($catId){
		$query = "SELECT * FROM tbl_category WHERE catId = '$catId'";
		$result = $this->db->select($query);
		return $result;
	}
	public function getSearch($data){
		$search = $this->fm->validation($data['search']);
		$search = mysqli_real_escape_string($this->db->link,$search);
		if($search == "") {
			return false;
		}else{
		$query = "SELECT * FROM tbl_product WHERE productName LIKE '%$search%'";
		$result = $this->db->select($query);
		return $result;
		}
	}
	public function comment($cmnt,$proId,$name){
		$cmnt = $this->fm->validation($cmnt);
		$cmnt = mysqli_real_escape_string($this->db->link,$cmnt);
		$proId = $this->fm->validation($proId);
		$proId = mysqli_real_escape_string($this->db->link,$proId);
		$name = $this->fm->validation($name);
		$nane = mysqli_real_escape_string($this->db->link,$name);
		$query = "INSERT INTO cmnt(name,comment,proId) VALUES('$nane','$cmnt','$proId')";
		$result = $this->db->insert($query);
		return $result;
	}
	public function comments($productId){
		$query = "SELECT * FROM cmnt WHERE proId='$productId'";
		$result = $this->db->select($query);
		return $result;
	}
	public function getSearchPro(){
		$query = "SELECT * FROM tbl_product";
		$result = $this->db->select($query);
		return $result;
	}
}

?>