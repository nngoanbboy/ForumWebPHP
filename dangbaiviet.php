<?php
	session_start();
	if(isset($_SESSION['email']) && $_SESSION['email'] != null){
		include 'header.php';
		echo 'Xin chào '.$_SESSION['tenHienThi'];
		include 'Templates/DangBaiViet.php';
	}
	else{
		header('Location: ./index.php');
	}

	
?>