<?php  
	session_start();
	ob_start();
	
	include "lib/koneksi.php";
	
	//error_reporting(“E_NOTICE”);
	$user = $_POST['uname'];
	$email = $_POST['email'];
	$pass = $_POST['password'];
	
	$namatoko = $_POST['storename'];
	$kategoritoko = $_POST['kategory'];
	$alamat = $_POST['alamat'];
	$telp = $_POST['telp'];
	
	if(empty($user)){
		echo "<script>alert('Username belum diisi')</script>";
		echo "<meta http-equiv='refresh' content='1 url=signup_forms.php'>";
	}else 
	if (empty($pass)){
		echo "<script>alert('Password belum diisi')</script>";
		echo "<meta http-equiv='refresh' content='1 url=signup_forms.php'>";
	}else
	if (empty($email)){
		echo "<script>alert('Email belum diisi')</script>";
		echo "<meta http-equiv='refresh' content='1 url=signup_forms.php'>";
	}else {
	$daftar1 = mysql_query("INSERT INTO master_user (nama_user,password,email) values ('$user','$pass','$email')",$con);
	$id_user = mysql_insert_id();
	echo "ID User yang baru di buat adalah: " . $id_user;
	echo "<br />";
	
	$daftar2 = mysql_query("INSERT INTO master_toko (nama_toko,kategori_toko,alamat_toko,email_toko) values ('$namatoko','$kategoritoko','$alamat','$telp')",$con);
	$id_toko = mysql_insert_id();
	echo "ID Toko yang baru di buat adalah: " . $id_toko;
	
	mysql_query("INSERT INTO user_toko (id_toko, id_user) VALUES ($id_toko, $id_user)");
	
	//$_SESSION['id_toko'] = $id_toko;
	//$_SESSION['id_user'] = $id_user;
	
	$daftar = $daftar1.$daftar2;
	
	if ($daftar){
		echo "<script>alert('Berhasil Mendaftar')</script>";
		header('Location: login.html');
	}else{
		echo "<script>alert('Gagal Mendaftar')</script>";
		echo "<meta http-equiv='refresh' content='1 url=signup_forms.php'>";
	}
	}
?>
	