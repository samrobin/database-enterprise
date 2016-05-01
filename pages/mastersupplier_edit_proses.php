<?php
require_once("../pages/lib/koneksi2.php");
	
if(isset($_GET['id']) && isset($_POST['edit'])){
	
$nama = $_POST['nama'];
$jk = $_POST['jk'];
$alamat = $_POST['alamat'];
$telp = $_POST['telepon'];

$sql = "UPDATE master_supplier SET nama_sup='$nama',jk_sup='$jk', alamat_sup='$alamat', telp_sup='$telp' WHERE id_sup = $_GET[id]";
			echo $sql;
			mysqli_query($k,$sql);
			header('Location: mastersupplier_home.php');
}