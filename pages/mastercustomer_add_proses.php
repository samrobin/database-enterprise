<?php
require_once("../pages/lib/koneksi2.php");
	
$nama = $_POST['nama'];
$jk = $_POST['jk'];
$alamat = $_POST['alamat'];
$telp = $_POST['telepon'];


			$sql = "INSERT INTO master_customer (nama_cust, alamat_cust, jk_cust, telp_cust)
			VALUES ('$nama','$alamat','$jk','$telp')";
			
			mysqli_query($k,$sql);

header('Location: mastercustomer_home.php');