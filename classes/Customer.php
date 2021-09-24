<?php
$filep = realpath(dirname(__FILE__));
include_once $filep."/../lib/Database.php";
include_once $filep."/../lib/Format.php";

class Customer{
	public $db;
	public $fm;
	public function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
	}
	public function getAllUser(){
		$query = "SELECT * FROM tbl_customer";
		$result = $this->db->select($query);
		return $result;
	}
	public function customInsert($data){
		$name    = $this->fm->validation($data['name']);
		$address = $this->fm->validation($data['address']);
		$city	 = $this->fm->validation($data['city']);
		$country = $this->fm->validation($data['country']);
		$zip	 = $this->fm->validation($data['zip']);
		$phone	 = $this->fm->validation($data['phone']);
		$email 	 = $this->fm->validation($data['email']);
		$pass	 = $this->fm->validation($data['pass']);
		
	
		$name = mysqli_real_escape_string($this->db->link,$data['name']);
		$address = mysqli_real_escape_string($this->db->link,$data['address']);
		$city = mysqli_real_escape_string($this->db->link,$data['city']);
		$country = mysqli_real_escape_string($this->db->link,$data['country']);
		$zip = mysqli_real_escape_string($this->db->link,$data['zip']);
		$phone = mysqli_real_escape_string($this->db->link,$data['phone']);
		$email = mysqli_real_escape_string($this->db->link,$data['email']);
		$pass = mysqli_real_escape_string($this->db->link,md5($data['pass']));
		if($name == ""|| $phone == "" || $email == "" || $pass == "") {
			$msg = "<span>Feild must not be empty!</span>";
			return $msg;
		}
		$chkMail = "SELECT * FROM tbl_customer WHERE email = '$email'";
		$chk = $this->db->select($chkMail);
		if($chk!= false){
			$msg = "<span>Email already exists</span>";
			return $msg;
		}else if($pass <= '5'){
			$msg = "<span>Password is too short. At last need minimum 6 charachter</span>";
			return $msg;
		}else{
			$query ="INSERT INTO tbl_customer(name,address,city,country,zip,phone,email,pass) VALUES('$name','$address','$city','$country','$zip','$phone','$email','$pass')";
			$custom = $this->db->insert($query);
			if($custom){
			
				
			$query = "SELECT * FROM tbl_customer WHERE email='$email' AND pass='$pass'";
			$result = $this->db->select($query);
			if($result!= false){
			$value = $result->fetch_assoc();
			Session::set("customLogin", true);
			Session::set("customId",$value['id']);
			Session::set("customEmail",$value['email']);
			echo"<script>window.location='index.php?success'</script>";
				}
			}else{
				$msg ="<span class='color:red'>Customer is not registered</span>";
			return $msg;
			}
		}
	}
	public function customLog($data){
		$email = $this->fm->validation($data['email']);
		$pass = $this->fm->validation($data['pass']);
		$email = mysqli_real_escape_string($this->db->link,$email);
		$pass = mysqli_real_escape_string($this->db->link,$pass);
		$pass = md5($pass);
		if(empty($email) && empty($pass)){
			$msg = "<span style='color:red'>Feild does not be empty</span>";
			return $msg;
		}
		$query = "SELECT * FROM tbl_customer WHERE email='$email' AND pass='$pass'";
		$result = $this->db->select($query);
		if($result!= false){
			$value = $result->fetch_assoc();
			Session::set("customLogin", true);
			Session::set("customId",$value['id']);
			Session::set("customEmail",$value['email']);?>
			<script>window.location="index.php"</script>
	<?php	}else{
			$msg = "<span style='color:red' >Data does not matched</span>";
			return $msg;
		}
	}
	public function customerData($id){
		$query ="SELECT * FROM tbl_customer WHERE id='$id'";
		$result = $this->db->select($query);
		return $result;
	}
	public function customerUpdate($data, $cmrId){
		$name    = $this->fm->validation($data['name']);
		$address = $this->fm->validation($data['address']);
		$city	 = $this->fm->validation($data['city']);
		$country = $this->fm->validation($data['country']);
		$zip	 = $this->fm->validation($data['zip']);
		$phone	 = $this->fm->validation($data['phone']);
		$email 	 = $this->fm->validation($data['email']);
		$rand =  md5(rand());
		
		$name = mysqli_real_escape_string($this->db->link,$data['name']);
		$address = mysqli_real_escape_string($this->db->link,$data['address']);
		$city = mysqli_real_escape_string($this->db->link,$data['city']);
		$country = mysqli_real_escape_string($this->db->link,$data['country']);
		$zip = mysqli_real_escape_string($this->db->link,$data['zip']);
		$phone = mysqli_real_escape_string($this->db->link,$data['phone']);
		$email = mysqli_real_escape_string($this->db->link,$data['email']);
		
		if($name == "" || $phone == "" || $email == "" ) {
		$msg = "<span>Feild must not be empty!</span>";
		return $msg;
		}else{
			$query ="UPDATE tbl_customer SET
					 name = '$name',
					 address ='$address',
					 city ='$city',
					 country = '$country',
					 zip = '$zip',
					 phone = '$phone',
					 rand ='$rand'
					  WHERE id='$cmrId'";
			$update_row = $this->db->update($query);
			if($update_row){
				$msg = "<span style='color:green'>Profile update successful!</span>";
				return $msg;
			}else{
				$msg = "<span style='color:red'>Profile update fail!</span>";
				return $msg;
			}
					 
		}
	}
	public function customerForget($data){
		$email	 = $this->fm->validation($data['email']);
		$email = mysqli_real_escape_string($this->db->link,$email);
		$base = base64_encode($email);
		$newToken = md5(rand());
		$query ="UPDATE tbl_customer SET rand='$newToken' WHERE email='$email'";
		$result = $this->db->update($query);
		
		$query ="SELECT * FROM tbl_customer WHERE email='$email'";
		$result = $this->db->select($query);
		if($result){
			
			header("location: newPass.php?base=$base");
		}else{
			$msg = "<span style='color:red'>Email not found!</span>";
			return $msg;
		}
	}
	public function cmrPassUpdate($data){
		$pass	 = $this->fm->validation($data['pass']);
		$passTwo	 = $this->fm->validation($data['passTwo']);
		$rand	 = $this->fm->validation($data['rand']);
		$token	 = $this->fm->validation($data['token']);
		$email	 = $this->fm->validation($data['email']);
		
		$email = mysqli_real_escape_string($this->db->link,$email);
		$rand = mysqli_real_escape_string($this->db->link,$rand);
		$token = mysqli_real_escape_string($this->db->link,$token);
		$pass = mysqli_real_escape_string($this->db->link,$pass);
		$passTwo = mysqli_real_escape_string($this->db->link,$passTwo);
		
		$passMd = md5($pass);
		
		if($pass == "" || $passTwo == "" || $rand == "") {
			$msg = "<span style='color:red'>Feild must not be empty!</span>";
			return $msg;
		}
	
		if($rand == $token){
		
			if(strlen($pass) < '5'){
				$msg = "<span style='color:red'>Password too short!</span>";
				return $msg;
			}else if($pass != $passTwo){
				$msg = "<span style='color:red'>Password can not match!</span>";
				return $msg;
			}else{
				$query = "UPDATE tbl_customer SET pass = '$passMd' WHERE email='$email'";
				$result = $this->db->update($query);
				header("location: login.php?success");
				
			}
		}else{
			$msg = "<span style='color:red'>Token can not match!</span>";
			return $msg;
		}
		
	}
	public function cmrSelect($email){
		$query ="SELECT * FROM tbl_customer WHERE email='$email'";
		$result = $this->db->select($query);
		return $result;	
	}
}