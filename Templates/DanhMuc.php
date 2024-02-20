<?php	
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "4rum";
	
	$idDanhMuc = $_GET['id'];
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	
	$sql = "SELECT BaiViet.*, TaiKhoan.tenHienThi from BaiViet Join TaiKhoan On BaiViet.idTaiKhoan = TaiKhoan.idTaiKhoan where idDanhMuc = $idDanhMuc ORDER BY idBaiViet DESC";
	$result = $conn->query($sql);
	
	$baiviet = array();
	
	if (mysqli_num_rows($result) > 0) {
		while($row = mysqli_fetch_assoc($result)) {
			$baiviet[] = $row;
		}
	}

?>
<div class="container mt-4">
    <div class="container-fluid p-0 ">

		<div class="row">
			<?php
				if(isset($_SESSION['email']) && $_SESSION['email'] != null){
					echo '<a href="dangbaiviet.php?id='.$_GET["id"].'"><button class="btn btn-primary ml-3 mb-2 float-right text-light">Đăng bài viết</button></a>';
				}
			?>
			
			<div class="col-xl-12">
				<div class="card">
					<div class="card-header pb-0 bg-dark text-light">
						<h5 class="card-title mb-2"><?php
							$sql = "select * from danhmuc where idDanhMuc = ".$_GET['id'];
							$result = $conn->query($sql);
							
							$danhmuc = null;
							if (mysqli_num_rows($result) > 0) {
								$danhmuc = mysqli_fetch_assoc($result);
							}
							echo $danhmuc['tieuDe'];
						?></h5>
					</div>
					<div class="card-body">
						<table class="table" style="width:100%">
							<tbody>
								<?php
									foreach($baiviet as $bv){
										$tieuDe = $bv['tieuDe'];
										if (mb_strlen($tieuDe, 'UTF-8') > 100) {
											$tieuDe = mb_substr($tieuDe, 0, 100, 'UTF-8') . ' ...';
										}
										$noiDung = $bv['noiDung'];
										if (mb_strlen($noiDung, 'UTF-8') > 200) {
											$noiDung = mb_substr($noiDung, 0, 200, 'UTF-8') . ' ...';
										}
								echo '<section class="blog-page mt-3">
								<div class="container-fluid">
									<div class="row">
										<div class="col-xl-12 col-lg-12 col-md-12 left-box">
											<div class="row clearfix">
												<div class="col-lg-12">
													<div class="single-blog-post card">
														<div class="header m-2">
															<h3><a href="baiviet.php?id='.$bv['idBaiViet'].'">' . $tieuDe . '</a></h3>
															<ul class="meta list-inline">
																<li><i class="ti-user"></i> Người đăng: <a href="xemhoso.php?id='.$bv['idTaiKhoan'].'">'.$bv['tenHienThi'].'</a></li>
																<li><i class="ml-3 ti-eye"></i> Lượt xem: '.$bv['luotXem'].'</li>
																<li><i class="ml-3 ti-calendar"></i> Ngày đăng: '.$bv['ngayDang'].'</li>
															</ul>
														</div>
														<div class="body m-2">
														<p>' . $noiDung . '</p>
														<a href="baiviet.php?id='.$bv['idBaiViet'].'" class="btn btn-info">Read More</a>
														</div>
													</div>                  
												</div>
											</div>             
										</div>
									</div>
								</div>
								</section>
								';
								}
								?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<link rel="icon" href="favicon.ico" type="image/x-icon">
<link rel="stylesheet" href="./Assets/image/themify-icons/themify-icons.css">
<!-- Favicon-->
<link href="./assets/template/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
<link href="./assets/template/assets/css/blog.css" rel="stylesheet">
<!-- Custom Css -->
<!-- <link href="./assets/template/assets/css/main.css" rel="stylesheet"> -->
<!-- choose a theme from css/themes instead of get all themes -->
<!-- <link href="./assets/css/themes/all-themes.css" rel="stylesheet" /> -->
</head>
<body class="">
<!-- Page Loader -->

<!-- main content -->

<!-- Jquery Core Js --> 
<script src="./assets/template/assets/bundles/libscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js ( jquery.v3.2.1, Bootstrap4 js) --> 
<script src="./assets/template/assets/bundles/vendorscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js --> 

<script src="./assets/template/assets/bundles/mainscripts.bundle.js"></script><!-- Custom Js -->
</body>
</html>