<?php
$filep = realpath(dirname(__FILE__));
include_once $filep."/../lib/Database.php";
include_once $filep."/../lib/Format.php";


class Cart{
	private $db;
	private $fm;
	
	public function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
	}
	public function addCart($quantity, $id){
		if($quantity <= 0){
			return false;
		}else{
		$productId = mysqli_real_escape_string($this->db->link, $id);
		$quantity = $this->fm->validation($quantity);
		$quantity = mysqli_real_escape_string($this->db->link,$quantity);
		$sId = session_id();
		$query = "SELECT * FROM tbl_product WHERE productId = '$id'";
		$result = $this->db->select($query)->fetch_assoc();
		$productName = $result['productName'];
		$price = $result['price'];
		$image = $result['image'];
		
		$chquery = "SELECT * FROM tbl_cart WHERE productId = '$id' AND sId= '$sId'";
		$getPro = $this->db->select($chquery);
		if($getPro){
			$msg = "This item already added";
			return $msg;
		}else{
		
		$query ="INSERT INTO tbl_cart(sId,productId,productName,price,quantity,image) VALUES('$sId','$productId','$productName','$price','$quantity','$image')";
		$cartAdd = $this->db->insert($query);
		if($cartAdd){?>
			<script>window.location= "cart.php"</script>
	<?php	}else{
			header("location: index.php");
		}
	  }
	  }
	}
		public function formatDate($date){
			return date('j,F Y, g:i a',strtotime($date));
		}
		public function getCartList(){
			$sId = session_id();
			$query = "SELECT * FROM tbl_cart WHERE sId='$sId'";
			$result = $this->db->select($query);
			return $result;
		}
		public function updateCartQuant($cartId, $quantity){
			$cartId = mysqli_real_escape_string($this->db->link,$cartId);
			$quantity = $this->fm->validation($quantity);
			$quantity = mysqli_real_escape_string($this->db->link,$quantity);
			
			$query = "UPDATE tbl_cart SET quantity = '$quantity' WHERE cartId = '$cartId'";
			$update_row = $this->db->update($query);
			if($update_row){
				$msg = "Quantity update successfully";
				return $msg;
			}else{
				$msg = "Quantity not updated";
				return $msg;
			}
		}
		public function delProductCart($delId){
		$delId = mysqli_real_escape_string($this->db->link, $delId);
			$query ="DELETE FROM tbl_cart WHERE cartId='$delId'";
			$cartDel = $this->db->delete($query);
			if($cartDel){
			$msg = "Cart delete successfull";
			return $msg;
			}else{
			$msg = "Cart not deleted";
			return $msg;
			}
		}
		public function checkCart(){
			$sId = session_id();
			$query = "SELECT * FROM tbl_cart WHERE sId='$sId'";
			$result = $this->db->select($query);
			return $result;
		}
		public function delCustCart(){
		$sId = session_id();
		$query = "DELETE FROM tbl_cart WHERE sId='$sId'";
		$result = $this->db->delete($query);
		return $result;
		}
		
		public function customerOrder($cmrId){
			$sId = session_id();
			$query = "SELECT * FROM tbl_cart WHERE sId = '$sId'";
			$getPro = $this->db->select($query);
			if($getPro){
				while($result = $getPro->fetch_assoc()){
					$productId = $result['productId'];
					$productName = $result['productName'];
					$quantity = $result['quantity'];
					$image = $result['image'];
					$price = $result['price']* $quantity;
				$query ="INSERT INTO tbl_order(cmrId,productId,productName,image,quantity,price) VALUES('$cmrId','$productId','$productName','$image','$quantity','$price')";
				$orderInsert = $this->db->insert($query);
				}
			}
		}
		public function payableAmount($cmrId){
			$query = "SELECT * FROM tbl_order WHERE cmrId='$cmrId' AND date = now()";
			$result = $this->db->select($query);
			return $result;
		}
		public function getOrderList($cmrId){
			$query = "SELECT * FROM tbl_order WHERE cmrId='$cmrId' ORDER BY date";
			$result = $this->db->select($query);
			return $result;
		}
		public function checkOrder($cmrId){
			$query = "SELECT * FROM tbl_order WHERE cmrId='$cmrId'";
			$result = $this->db->select($query);
			return $result;
		}
		public function getAllOrder(){
			$query = "SELECT * FROM tbl_order ORDER BY date";
			$result = $this->db->select($query);
			return $result;
		}
		public function getCustInfo($Id){
			$query = "SELECT * FROM tbl_customer WHERE id='$Id'";
			$result = $this->db->select($query);
			return $result;
		}
		public function getShift($id,$time){
			$id = mysqli_real_escape_string($this->db->link,$id);
			//$price = mysqli_real_escape_string($this->db->link,$price);
			$time = mysqli_real_escape_string($this->db->link,$time);
			
			$id = $this->fm->validation($id);
			//$price = $this->fm->validation($price);
			$time = $this->fm->validation($time);
			
				$query = "UPDATE tbl_order SET status ='1' WHERE cmrId = '$id' AND date='$time'";
				$update_row = $this->db->update($query);
				if($update_row){
				$msg = "Shifted successfully";
				return $msg;
				}else{
				$msg = "Shifted failed!";
				return $msg;
				}
		}
		public function getDelPro($id,$time){
			$id = mysqli_real_escape_string($this->db->link,$id);
			//$price = mysqli_real_escape_string($this->db->link,$price);
			$time = mysqli_real_escape_string($this->db->link,$time);
		
			$id = $this->fm->validation($id);
	//		$price = $this->fm->validation($price);
			$time = $this->fm->validation($time);
			
		$query = "DELETE FROM tbl_order WHERE cmrId = '$id' AND date='$time'";
		$update_row = $this->db->delete($query);
		if($update_row){
		$msg = "Delete successfully";
		return $msg;
		}else{
		$msg = "Delete failed!";
		return $msg;
		}
		}
		public function getConfirm($id,$time){
		$id = mysqli_real_escape_string($this->db->link,$id);
		//$price = mysqli_real_escape_string($this->db->link,$price);
		$time = mysqli_real_escape_string($this->db->link,$time);
		
		$id = $this->fm->validation($id);
		//$price = $this->fm->validation($price);
		$time = $this->fm->validation($time);
			$query = "UPDATE tbl_order SET status='2' WHERE cmrId = '$id' AND date='$time'";
			$update_row = $this->db->update($query);
			if($update_row){
			$msg = "Confirm successfully";
			return $msg;
			}else{
			$msg = "Confrim failed!";
			return $msg;
			}
		}
		public function getInfo($info){
			$query = "SELECT * FROM tbl_order WHERE id='$info'";
			$result = $this->db->select($query);
			return $result;
		}
}
?>