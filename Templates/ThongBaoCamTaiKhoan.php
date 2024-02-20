<?php
	session_start();
	if(isset($_SESSION['thoiLuongCam']) && $_SESSION['thoiLuongCam'] == 0){
		header("Location: /index.php");
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Psychology Forum</title>
  <link rel="shortcut icon" href="{{ asset('favicon.ico')}}">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
    crossorigin="anonymous">
  
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-dark">
    <a class="navbar-brand text-light" href="index.php">Diễn đàn Tâm lý học</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
		<?php
			if(isset($_SESSION['capBac']) && $_SESSION['capBac'] == 10){
				echo '<li class="nav-item active">
          <a class="nav-link text-light" href="quanlychuyenmuc.php">Quản lý chuyên mục</a>
        </li>';
				echo '<li class="nav-item active">
					<a class="nav-link text-light" href="quanlydanhmuc.php">Quản lý danh mục</a>
					</li>';
					echo '<li class="nav-item active">
					<a class="nav-link text-light" href="quanlytaikhoan.php">Quản lý tài khoản</a>
					</li>';
					echo '<li class="nav-item active">
					<a class="nav-link text-light" href="quanlybaiviet.php">Quản lý Bài viết</a>
					</li>';
			}
		?>
        <li class="nav-item active">
          <a class="nav-link text-light" href="index.php">Trang chủ</a>
        </li>
		
		<?php
			if(isset($_SESSION['email']) && $_SESSION['email'] != null){
				echo '<li class="nav-item">
          <a class="nav-link text-light" href="logout.php">Đăng xuất</a>
        </li>';
			}
			else{
				echo '<li class="nav-item">
          <a class="nav-link text-light" href="register.php">Đăng ký</a>
        </li>
	  
        <li class="nav-item">
          <a class="nav-link text-light" href="login.php">Đăng nhập</a>
        </li>';
			}
		?>
        
      </ul>
    </div>
  </nav>
   
   <?php
	echo 'Xin chào '.$_SESSION['tenHienThi'].'<br>Vì bạn đã vi phạm nội quy của diễn đàn, bạn bị cấm trong vòng '.$_SESSION['thoiLuongCam'].' giây!';
   ?>
</body>

</html>