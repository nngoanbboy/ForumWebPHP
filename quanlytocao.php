<?php
	session_start();
	if(isset($_SESSION['email']) && $_SESSION['email'] != null && isset($_SESSION['capBac']) && $_SESSION['capBac'] == 10){
		include 'header.php';
		include 'Templates/QuanLyToCao.php';
	}
	else{
		header("Location: ./index.php");
	}
?>