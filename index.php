<?php
	session_start();
	if(isset($_SESSION['email']) && $_SESSION['email'] != null){
		include 'header.php';
		echo 'Xin chào '.$_SESSION['tenHienThi'];
		if($_SESSION['capBac'] != 10){
			echo '. Bạn là thành viên của diễn đàn.';
		}
		else{
			echo '. Bạn là quản trị viên của diễn đàn.';
		}
		include 'Templates/TrangChu.php';
	}
	else{
		include 'header.php';
		echo 'Hello guest.';
		$_SESSION['tenHienThi'] = "Guest";
		include 'Templates/TrangChu.php';
	}
?>