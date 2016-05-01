<?php
require_once("../pages/lib/koneksi2.php");
	
if(isset($_GET['id']) && isset($_POST['edit'])){
	
$nama = $_POST['nama'];
$jk = $_POST['jk'];
$alamat = $_POST['alamat'];
$telp = $_POST['telepon'];

$sql = "UPDATE master_customer SET nama_cust='$nama',jk_cust='$jk', alamat_cust='$alamat', telp_cust='$telp' WHERE id_cust = $_GET[id]";
			echo $sql;
			mysqli_query($k,$sql);
			header('Location: mastercustomer_home.php');
}