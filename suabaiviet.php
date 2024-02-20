<?php
	session_start();
	if(isset($_SESSION['email']) && $_SESSION['email'] != null ){
		include 'header.php';
		include 'Templates/SuaBaiViet.php';
	}
	
?>