<?php
	$server = 'localhost';
	$user	= 'root';
	$pass	= '';
	$db		= 'simple_pos';
	
	$con = mysql_connect($server,$user,$pass);
	$db = mysql_select_db($db);
	date_default_timezone_set("Asia/Bangkok");
?>