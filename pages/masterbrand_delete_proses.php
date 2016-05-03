<?php
require_once("../pages/lib/koneksi2.php");

if(isset($_GET['delbra']) && $_GET['delbra'] == true){
	$sql = "DELETE FROM master_brand WHERE id_bra=$_GET[id]";
	mysqli_query($k,$sql);
	header('Location:masterbrand_home.php');
}