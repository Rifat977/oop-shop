<?php
$filep = realpath(dirname(__FILE__));
include_once $filep."/../lib/Session.php";
Session::checkLogin();
//include"../lib/config.php";
include_once $filep."/../lib/Database.php";
include_once $filep."/../lib/Format.php";


class Adminlogin{
	private $db;
	private $fm;
	public function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
	}
	public function adminLogin($adminUser,$adminPass){
		$adminUser = $this->fm->validation($adminUser);
		$adminPass = $this->fm->validation($adminPass);
		
		$adminUser = mysqli_real_escape_string($this->db->link,$adminUser);
		$adminPass = mysqli_real_escape_string($this->db->link,$adminPass);
		if(empty($adminUser) || empty($adminPass)){
			$loginmsg = "Feild must not be empty!";
			return $loginmsg;
		}else{
			$query = "SELECT * FROM db_user WHERE adminUser='$adminUser' AND adminPass='$adminPass';";
			$result = $this->db->select($query);
			if($result != false){
				$value = $result->fetch_assoc();
				Session::set("adminlogin",true);
				Session::set("adminId",$value['id']);
				Session::set("adminUser",$value['adminUser']);
				Session::set("adminName",$value['adminName']);
				header("location: dashbord.php");
			}else{
				$loginmsg ="Password does not match!";
				return $loginmsg;
			}
		}
	}
}
?>