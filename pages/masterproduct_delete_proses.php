<?php
require_once("../pages/lib/koneksi2.php");

if(isset($_GET['delbar']) && $_GET['delbar'] == true){
	$sql = "DELETE FROM master_barang WHERE id_bar=$_GET[id]";
	mysqli_query($k,$sql);
	header('Location:masterproduct_home.php');
}