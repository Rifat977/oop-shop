<?php
$filep = realpath(dirname(__FILE__));
include_once $filep."/../lib/Database.php";
include_once $filep."/../lib/Format.php";

class Brand{
	private $db;
	private $fm;
	
	public function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
	}
	public function brandInsert($brandName){
	$brandName = $this->fm->validation($brandName);
	$brandName = mysqli_real_escape_string($this->db->link,$brandName);
	if(empty($brandName)){
	$msg = "Category feild must not be empty!";
	return $msg;
	}else{
	$query ="INSERT INTO tbl_brand(brandName) VALUES('$brandName')";
	$brandName = $this->db->insert($query);
	if($brandName){
	$msg ="<span class='color:green'>Brand Name inserted succesfully!</span>";
	return $msg;
	}else{
		$msg ="<span class='color:red'>Brand Name not inserted</span>";
		return $msg;
		}
	}
}
	public function getAllBrand(){
		$query = "SELECT * FROM tbl_brand ORDER BY brandId DESC";
		$result = $this->db->select($query);
		return $result;
	}
	public function brandUpdate($brandName,$id){
		$brandName = $this->fm->validation($brandName);
		$brandName = mysqli_real_escape_string($this->db->link,$brandName);
		$brandId = mysqli_real_escape_string($this->db->link,$id);
		if(empty($brandName)){
			$msg ="Feild must not be empty!";
			return $msg;
		}else{
			$query ="UPDATE tbl_brand SET brandName='$brandName' WHERE brandId='$brandId'";
			$update = $this->db->update($query);
			if($update){
				$msg = "Brand update successfully!";
				return $msg;
			}else{
				$msg ="Brand update failed!";
				return $msg;
			}
		}
		
	}
	public function getBrandById($id){
		$query ="SELECT * FROM tbl_brand WHERE brandId='$id'";
		$getBrand =$this->db->select($query);
		return $getBrand;
	}
	public function delBrandById($id){
		$query ="DELETE FROM tbl_brand WHERE brandId='$id'";
		$delete=$this->db->delete($query);
		if($delete){
			$msg = "Data delete successfully";
			return $msg;		
		}else{
			$msg = "Data delete faild";
			return $msg;	
		}
	}
	public function getAllTopBrand(){
		$query = "SELECT * FROM tbl_brand";
		$result = $this->db->select($query);
		return $result;
	}
	public function getProByBd($bdId){
		$query = "SELECT * FROM tbl_product WHERE brandId = '$bdId'";
		$result = $this->db->select($query);
		return $result;
	}
}
?>