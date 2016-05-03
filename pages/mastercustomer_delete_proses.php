<?php
require_once("../pages/lib/koneksi2.php");

if(isset($_GET['delcust']) && $_GET['delcust'] == true){
	$sql = "DELETE FROM master_customer WHERE id_cust=$_GET[id]";
	mysqli_query($k,$sql);
	header('Location:mastercustomer_home.php');
}