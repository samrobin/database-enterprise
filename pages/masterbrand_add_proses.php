<?php
require_once("../pages/lib/koneksi2.php");

$bra = $_POST['brand'];

			$sql = "INSERT INTO master_brand (nama_bra)
			VALUES ('$bra') ";
			
			mysqli_query($k,$sql);

if(mysqli_error($k)){
	die(mysqli_error($k));

}
header('Location: masterbrand_home.php');