<?php
require_once("../pages/lib/koneksi2.php");
require_once("functions.php");
	
if(isset($_GET['id']) && isset($_POST['edit'])){
	
$img=$_FILES['foto'];
$kode = $_POST['kode'];
$nama = $_POST['nama'];
$hargajual = $_POST['hargajual'];
$hargabeli = $_POST['hargabeli'];
$img_ext = "jpg, png, jpeg, gif, bmp, svg";
$max_size = 2*1024*1024;


if(check_file_extension($img['name'], $img_ext)){
		if($img['size'] <= 2*1024*1024){
			$sumber = $img['tmp_name'];
			$tujuan = '../pages/images/product/'.$_GET['id'].'.jpg';
			move_uploaded_file($sumber, $tujuan);
			$sql = "UPDATE dokter SET kode_bar='$kode',nama_bar='$nama', hargajual_bar='$hargajual', hargabeli_bar='$hargabeli',
			foto_bar='$tujuan' WHERE id_bar = $_GET[id]";
			echo $sql;
			mysqli_query($k,$sql);
			header('Location: masterproduct_home.php');

}
		}
}
