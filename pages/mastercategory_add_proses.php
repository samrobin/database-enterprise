<?php
require_once("../pages/lib/koneksi2.php");

$cat = $_POST['category'];

			$sql = "INSERT INTO master_category (nama_cat)
			VALUES ('$cat') ";
			
			mysqli_query($k,$sql);

if(mysqli_error($k)){
	die(mysqli_error($k));

}
header('Location: mastercategory_home.php');