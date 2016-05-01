<?php
require_once("../pages/lib/koneksi2.php");
	
$nama = $_POST['nama'];
$jk = $_POST['jk'];
$alamat = $_POST['alamat'];
$telp = $_POST['telepon'];


			$sql = "INSERT INTO master_supplier (nama_sup, alamat_sup, jk_sup, telp_sup)
			VALUES ('$nama','$alamat','$jk','$telp')";
			
			mysqli_query($k,$sql);

header('Location: mastersupplier_home.php');