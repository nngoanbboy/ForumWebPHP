<!DOCTYPE html>
<html>
	<head>
	</head>
	<body>
		<?php 
			if($ketqua == true){
				header("Location: ./index.php");
			}
			else{
				echo '<div class="container my-5 bg-danger text-white"><br><h2 align="center">Đăng nhập thất bại!</h2><br></div>';
			}
		?>
	</body>
</html>