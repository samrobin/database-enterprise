<?php
require_once("../pages/lib/koneksi2.php");
	
if(isset($_GET['id']) && isset($_POST['edit'])){
	
$nama = $_POST['name'];


			$sql = "UPDATE master_category SET nama_cat='$nama' WHERE id_cat = $_GET[id]";
			echo $sql;
			mysqli_query($k,$sql);
			header('Location: mastercategory_home.php');

}
