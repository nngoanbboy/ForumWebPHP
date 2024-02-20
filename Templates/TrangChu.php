<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "4rum";
	
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	
	$sql = "SELECT * from ChuyenMuc";
	$result = $conn->query($sql);
	
	$datas = array();
	
	if (mysqli_num_rows($result) > 0) {
		
		while($row = mysqli_fetch_assoc($result)) {
			if ($row['idChuyenMuc'] == 17) {
				$row['imagePath'] = 'image\AI.jpg';
			} elseif ($row['idChuyenMuc'] == 21) {
				$row['imagePath'] = 'image\NgonNgu.jpg';
			}
			
			else{
				$row['imagePath'] = 'image\IT.jpg';
			}
			
			$datas[] = $row;
			
		}
	}
	
	$sql = "Select * from DanhMuc";
	$result = $conn->query($sql);
	
	$danhmuc = array();
	
	if(mysqli_num_rows($result) > 0){
		while($row = mysqli_fetch_assoc($result)){
			$danhmuc[] = $row;
		}
	}
	
	$sql = "Select * from BaiViet";
	$result = $conn->query($sql);

	$bvdata = array();

	if (mysqli_num_rows($result) > 0) {
		while ($row = mysqli_fetch_assoc($result)) {
			$bvdata[] = $row;
		}
	}

?>


<div class="container">
	<div class="container-fluid p-0">
		<br>
		<div class="row">
			<div class="col-xl-8">
				<?php
				
				foreach ($datas as $data) {

					echo '
					<div class="card">
					<div class="card-header pb-0 bg-dark text-light">
					
						<h5 class="card-title mb-2 ml-4">Chuyên mục: ' . $data['tieuDe'] . '</h5>
					</div>
					<div class="card-body">
					<img src="' . $data['imagePath'] . '" alt="Chuyen Muc Image" style="max-width: 700px; max-height: 600px;">
						<table class="table" style="width:100%">
							<tbody>
								';
					foreach ($danhmuc as $dm) {
						$result = mysqli_query($conn, 'select count(idBaiViet) as total from baiviet LEFT JOIN `danhmuc` ON `baiviet`.`idDanhMuc` = `danhmuc`.`idDanhMuc`
						WHERE `danhmuc`.`idDanhMuc` = ' . $dm['idDanhMuc']);
						$row = mysqli_fetch_assoc($result);
						$total_records = $row['total'];
						if ($dm['idChuyenMuc'] == $data['idChuyenMuc']) {
							echo '
							<tr>
								<td>
									<ul style="list-style: none;">
										<strong><li style="font-size: 18px; list-style: none;"><a href="danhmuc.php?id=' . $dm['idDanhMuc'] . '">' . $dm['tieuDe'] . '</a></li></strong>	
										<li style="font-size: 12px; list-style: none;"><i class="ti-hand-point-right bold"></i><a class="text-dark" href="danhmuc.php?id=' . $dm['idDanhMuc'] . '"> Tổng số bài viết: ' . $total_records . '</li>
									</ul>
								</td>
							</tr>
						';
						}
					}
					echo '
							</tbody>
						</table>
					</div>
					</div>';
					}
					?>
					
			</div>
			


			<div class="col-xl-4">
				<div class="card">
				
					<div class="card-header pb-0 bg-dark text-light">
					<h5 class="card-title mb-2 text-center">10 Bài viết nổi bật nhất</h5>
				</div>
				

			<?php

					$sql = "SELECT BaiViet.*, TaiKhoan.tenHienThi from BaiViet Join TaiKhoan On BaiViet.idTaiKhoan = TaiKhoan.idTaiKhoan ORDER BY luotXem DESC limit 10;";
					$result = $conn->query($sql);

					$bvdata = array();

					if (mysqli_num_rows($result) > 0) {
					while ($row = mysqli_fetch_assoc($result)) {
					$bvdata[] = $row;
					}
				}
					echo '
			<div class="card-body">
				<table class="table" style="width:100%">
					<tbody>
				';
					foreach ($bvdata as $bv) {
						$tieuDe = $bv['tieuDe'];
						if (mb_strlen($tieuDe, 'UTF-8') > 50) {
							$tieuDe = mb_substr($tieuDe, 0, 50, 'UTF-8') . ' ...';
						}
					echo '
					<tr>
						<td>
						<ul>
						<li style="list-style: none;">
						<a href="baiviet.php?id=' . $bv['idBaiViet'] . '">' . $tieuDe . '</a>
						</li>
						<li style="font-size: 12px; list-style: none;" class="mt-2">
						<i class="ti-user"></i> Người đăng: <a class="text-dark" href="xemhoso.php?id='.$bv['idTaiKhoan'].'">'.$bv['tenHienThi'].'</a></li>
						<li style="font-size: 12px; list-style: none;">
						<i class=" ti-eye"></i> Lượt xem: '.$bv['luotXem'].'</li>				
						<li style="font-size: 12px; list-style: none;">
						<i class=" ti-calendar"></i> Ngày đăng: '.$bv['ngayDang'].'</li>	
						</ul>
						</td>
					</tr>
				';
				}
			
					echo '
					</tbody>
				</table>
			</div>
			</div>';
			?>
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
<style>
        body {
            background-image: url('image/BG.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            /* Add other background properties as needed */
        }
    </style>
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