
<!DOCTYPE html>
<html>
	<head>
	</head>
	<body>
		<?php foreach($danhsachtaikhoan as $taikhoan) : ?>
			<?php
				echo $taikhoan['idTaiKhoan'].' - '.$taikhoan['email'];
			?>
		<?php endforeach;?>
	</body>
</html>