<?php //file name:functions.php

function check_file_extension($file_name, $ext_boleh){

	$file_ext = explode(".", $file_name);
	$file_ext = end($file_ext);
	$file_ext = strtolower($file_ext);
	$ext_boleh = (explode(",", str_replace(" ", "", $ext_boleh)));
	
	if(in_array($file_ext, $ext_boleh)){
		return true;
	}else{
		return false;
	}
}

//check_file_extension('hehe.jpg', 'jpg, png');