<?php
require_once("../pages/lib/koneksi2.php");
require_once("functions.php");
	
	$sql2="SELECT id_bar from master_user order by id_user desc";
	$hasil=mysqli_query($k, $sql2);
	$test=mysqli_fetch_array($hasil);
	$terakhir=$test['id_user']+1;
	
	
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
			$tujuan = '../pages/images/user/'.$terakhir.'.jpg';
			move_uploaded_file($sumber, $tujuan);
			$sql = "INSERT INTO master_user (nama_user, jk_user, telp_user, alamat_user, jabatan_user, foto_user, password, email)
			VALUES ('$realname','$jk','$telp','$alamat','$jabatan','$tujuan','$pass','$mail')";
			
			mysqli_query($k,$sql);
}}
header('Location: masteruser_home.php');