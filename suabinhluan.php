<?php
	session_start();
	include 'header.php';
	echo 'Xin chào '.$_SESSION['tenHienThi'];
	include 'Templates/SuaBinhLuan.php';
	
?>