<?php
$connect = mysqli_connect("localhost","root","","crud");
 if(isset($_POST['url'])){
 $url = $_POST['url'];
 $short = substr(md5($url.rand()),0,10);
 $sql = "INSERT INTO data(name,location) VALUES('$url','$short')";
 $qr =  mysqli_query($connect,$sql);
 	if($qr){
 
 		echo "<a href=''>localhost:8080/shop/admin/get.php?link=".$short."</a>";
 	}
 }

?>