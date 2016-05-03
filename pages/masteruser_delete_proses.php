<?php
require_once("../pages/lib/koneksi2.php");

if(isset($_GET['deluser']) && $_GET['deluser'] == true){
	$sql = "DELETE FROM master_user WHERE id_user=$_GET[id]";
	mysqli_query($k,$sql);
	header('Location:masteruser_home.php');
}