<?php
	session_start();
	if(isset($_SESSION['email']) && $_SESSION['email'] != null ){
	$tieuDe = $_POST['tieuDe'];
	include 'header.php';
	include 'Templates/TimKiemBaiViet.php';
	}
?>