<?php
require_once("../pages/lib/koneksi2.php");
require_once("functions.php");
	
if(isset($_GET['id']) && isset($_POST['edit'])){
	
$img=$_FILES['foto'];
$realname = $_POST['realname'];
$username = $_POST['username'];
$pass = $_POST['pass'];
$jk = $_POST['jk'];
$alamat = $_POST['alamat'];
$telp = $_POST['telepon'];
$jabatan = $_POST['jabatan'];
$mail = $_POST['mail'];
$img_ext = "jpg, png, jpeg, gif, bmp, svg";
$max_size = 2*1024*1024;


if(check_file_extension($img['name'], $img_ext)){
		if($img['size'] <= 2*1024*1024){
			$sumber = $img['tmp_name'];
			$tujuan = '../pages/images/user/'.$_GET['id'].'.jpg';
			move_uploaded_file($sumber, $tujuan);
			$sql = "UPDATE master_user SET nama_user='$realname', jk_user='$jk', alamat_user='$alamat', telp_user='$telp',
			jabatan_user='$jabatan', foto_user='$tujuan', password='$pass', email='$mail' WHERE id_user = $_GET[id]";
			echo $sql;
			mysqli_query($k,$sql);
			header('Location: masteruser_home.php');

}
		}
}
