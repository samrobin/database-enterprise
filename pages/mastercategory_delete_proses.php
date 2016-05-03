<?php
require_once("../pages/lib/koneksi2.php");

if(isset($_GET['delcat']) && $_GET['delcat'] == true){
	$sql = "DELETE FROM master_category WHERE id_cat=$_GET[id]";
	mysqli_query($k,$sql);
	header('Location:mastercategory_home.php');
}