<?php
require_once("../pages/lib/koneksi2.php");

if(isset($_GET['delsup']) && $_GET['delsup'] == true){
	$sql = "DELETE FROM master_supplier WHERE id_sup=$_GET[id]";
	mysqli_query($k,$sql);
	header('Location:mastersupplier_home.php');
}