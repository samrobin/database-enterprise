<?php  
	ob_start();
	
	session_start();
	include "lib/koneksi.php";
	
	$username=$_POST['username']; //tangkap data yg di input dari form login input username
    $password=$_POST['pass']; //tangkap data yg di input dari form login input password

	$query=mysql_query("select * from master_user where nama_user='$username' and password='$password'"); //melakukan pengampilan data dari database untuk di cocokkan
	$xxx=mysql_num_rows($query); //melakukan pencocokan
	
   if($xxx==TRUE){ // melakukan pemeriksaan kecocokan dengan percabangan.
      $_SESSION['nama_user']=$username; //jika cocok, buat session dengan nama sesuai dengan username
	  //$_SESSION['nama_toko']=$namatoko;
	  
	  // DAPETIN ID USER YANG LOGIN
	  $row = mysql_fetch_array($query, MYSQL_BOTH);
	  echo "ID USER YANG LOGIN ADALAH: " . $row[0];
	  
	  $_SESSION['id_user'] = $row[0];
	  
	  $query2 = mysql_query("SELECT * FROM user_toko WHERE id_user=$row[0]");
	  
	  $row2 = mysql_fetch_array($query2, MYSQL_BOTH);
	  echo "USER ID YANG LAGI LOGIN, PUNYA TOKO DENGAN ID: " . $row2[1];
	  
	  $_SESSION['id_toko'] = $row2[1];
	  
	  
      //header("location:index.html"); // dan alihkan ke index.php
   }else
   {echo "<script> alert('Username atau Password Salah'); location = 'login.html'; </script>";}
   ?>