<?php
require_once("../pages/lib/koneksi2.php");
	
if(isset($_GET['id']) && isset($_POST['edit'])){
	
$nama = $_POST['name'];


			$sql = "UPDATE master_brand SET nama_bra='$nama' WHERE id_bra = $_GET[id]";
			echo $sql;
			mysqli_query($k,$sql);
			header('Location: masterbrand_home.php');

}
