<?php
	if (isset($_POST['form']) && $_POST['form'] == 'submitted') {
		// Form 1 was submitted
		require_once('controllers/QuanLyBaiVietController.php');
		$quanLyBaiVietController = new QuanLyBaiVietController();
		$quanLyBaiVietController->XoaBaiVietBanThan(); 
	}
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "4rum";
	
	$idBaiViet = $_GET['id'];
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	
	$sql = "SELECT * from BaiViet join TaiKhoan on BaiViet.idTaiKhoan = TaiKhoan.idTaiKhoan where idBaiViet = $idBaiViet";
	$result = $conn->query($sql);
	
	$baiviet = null;
	
	if (mysqli_num_rows($result) > 0) {
		$baiviet = mysqli_fetch_assoc($result);
	}
	
?>

<div class="container">
    <div class="container-fluid p-0">
		<div class="row">
			
			<div class="col-xl-12">
			<form method="post">
				<input type="hidden" name="form" value="submitted">
			
				<button  type="submit" class="btn btn-primary mt-2">Xác nhận</button> 
				
				</form>
				<br><br>
				
				
			</div>


		</div>

	</div>
</div>
