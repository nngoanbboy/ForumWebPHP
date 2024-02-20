<?php
	session_start();
	echo $_GET['id'];
	echo $_SESSION['path'];
	
	header("Location: ".$_SESSION['path']);
?>