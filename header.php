<?php
	if(isset($_SESSION['thoiLuongCam']) && $_SESSION['thoiLuongCam'] > 0){
		header("Location: /banned.php");
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Câu Lạc Bộ Tin Học</title>
  <link rel="shortcut icon" href="{{ asset('favicon.ico')}}">
  <link rel="icon" type="image/x-icon" href="./assets/image/favicon/favicon1.ico">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
    crossorigin="anonymous">
    <meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<link rel="icon" href="favicon.ico" type="image/x-icon">
<!-- Favicon-->
<link href="./assets/template/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />


</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-primary">
    <a class="navbar-brand text-light" href="index.php"><strong>Diễn đàn Câu Lạc Bộ Tin Học</strong></a>
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

					echo '<li class="nav-item active">
					<a class="nav-link text-light" href="quanlytocao.php">Quản lý Tố cáo</a>
					</li>
          ';

			}
		?>
        <li class="nav-item active">
          <a class="nav-link text-light" href="index.php">Trang chủ</a>
        </li>
		
		<?php
			if(isset($_SESSION['email']) && $_SESSION['email'] != null){
        echo '<li class="nav-item">
          <a class="nav-link text-light" href="xemhoso.php?id='.$_SESSION['idTaiKhoan'].'">Hồ sơ cá nhân</a>
        </li>';
				echo '<li class="nav-item">
          <a class="nav-link text-light" href="caidattaikhoan.php">Cài đặt</a>
        </li>';
				echo '<li class="nav-item">
          <a class="nav-link text-light" href="logout.php">Đăng xuất</a>
        </li>';
        echo '<div><li class="nav-item active">
        <form method="post" action="timkiembaiviet.php" class="ml-4 mt-2" style="float: right;">
        <input type="hidden" name="form" value="submitted">
        <input type="text" name="tieuDe" required placeholder="Tìm kiếm với tiêu đề">
        <button type="submit" value="submitted" class="btn-warning text-dark">Tìm kiếm</button>
        </form>
        </li></div>
        ';
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
   
  <script src="./assets/template/assets/bundles/libscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js ( jquery.v3.2.1, Bootstrap4 js) --> 
<script src="./assets/template/assets/bundles/vendorscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js --> 

<script src="./assets/template/assets/bundles/mainscripts.bundle.js"></script><!-- Custom Js -->
</body>

</html>