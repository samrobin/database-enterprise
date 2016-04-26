<?php
require_once("../pages/lib/koneksi2.php");
require_once("functions.php");
	
	$sql2="SELECT id_bar from master_barang order by id_bar desc";
	$hasil=mysqli_query($k, $sql2);
	$test=mysqli_fetch_array($hasil);
	$terakhir=$test['id_bar']+1;
	
	
$img=$_FILES['foto'];
$kode = $_POST['kode'];
$nama = $_POST['nama'];
$hargajual = $_POST['hargajual'];
$hargabeli = $_POST['hargabeli'];
$cat = $_POST['kategori'];
$img_ext = "jpg, png, jpeg, gif, bmp, svg";
$max_size = 2*1024*1024;


if(check_file_extension($img['name'], $img_ext)){
		if($img['size'] <= 2*1024*1024){
			$sumber = $img['tmp_name'];
			$tujuan = '../pages/images/product/'.$terakhir.'.jpg';
			move_uploaded_file($sumber, $tujuan);
			$sql = "INSERT INTO master_barang (kode_bar, nama_bar, hargabeli_bar, hargajual_bar, foto_bar)
			VALUES ('$kode','$nama','$hargabeli','$hargajual','$tujuan')";
			
			mysqli_query($k,$sql);

if(mysqli_error($k)){
	die(mysqli_error($k));
}
		}
}
header('Location: masterproduct_home.php');