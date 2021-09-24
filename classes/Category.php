<?php
$filep = realpath(dirname(__FILE__));

include_once $filep."/../lib/Database.php";
include_once $filep."/../lib/Format.php";

class Category{
	private $db;
	private $fm;
	
	public function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
	}
	public function catInsert($catName){
		$catName = $this->fm->validation($catName);
		$catName = mysqli_real_escape_string($this->db->link,$catName);
		if(empty($catName)){
		$msg = "Category feild must not be empty!";
		return $msg;
		}else{
			$query ="INSERT INTO tbl_category(catName) VALUES('$catName')";
			$catinsert = $this->db->insert($query);
			if($catinsert){
				$msg ="<span class='color:green'>Category inserted succesfully!</span>";
				return $msg;
			}else{
				$msg ="<span class='color:red'>Category not inserted</span>";
				return $msg;
			}
		}
	}
	public function getAllCat(){
		$query = "SELECT * FROM tbl_category ORDER BY catId DESC";
		$result = $this->db->select($query);
		return $result;
	}
	public function getCatById($id){
		$query = "SELECT * FROM tbl_category WHERE catId = '$id'";
		$result = $this->db->select($query);
		return $result;
	}
	public function catUpdate($catName,$id){
		$catName = $this->fm->validation($catName);
		$catName = mysqli_real_escape_string($this->db->link,$catName);
		$catid = mysqli_real_escape_string($this->db->link,$id);
		if(empty($catName)){
		$msg = "Category feild must not be empty!";
		return $msg;
		}else{
			$query = "UPDATE tbl_category SET catName='$catName' WHERE catId = '$catid'";
			$update_row = $this->db->update($query);
			if($update_row){
				$msg="Update successfully";
				return $msg;
			}else{
				$msg="Not Updated";
				return $msg;
			}
	}
}
	public function delCatById($id){
		$query ="DELETE FROM tbl_category WHERE catId='$id'";
		$catDel = $this->db->delete($query);
		if($catDel){
			$msg = "Category update successfull";
			return $msg;
		}else{
			$msg = "Category not updated";
			return $msg;
		}
	}
	public function getAllBrand(){
	$query = "SELECT * FROM tbl_brand ORDER BY brandId DESC";
	$result = $this->db->select($query);
	return $result;
	}
	public function getACat($id){
		$query = "SELECT * FROM tbl_category WHERE catId='$id'";
		$result = $this->db->select($query);
		return $result;
	}
	public function getCatByProducts($catId){
			$query = "SELECT * FROM tbl_category WHERE catId='$catId'";
			$result = $this->db->select($query);
			return $result;
	}
}/*

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
		
		if($productName == "" || $catId == "" || $brandId == "" || $body == "" || $price == "" || $type == ""){
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
}
*/
?>