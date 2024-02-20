<?php
	class QuanLyTaiKhoanModel{
		public function LayKetQuaPhanQuyen($idTaiKhoan,$capBac){
			$ketqua = false;
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
			
			$sql = "update TaiKhoan set capBac=$capBac where idTaiKhoan = $idTaiKhoan";
			
			if ($conn->query($sql) === TRUE) {
				$ketqua = true;
			}
			
			return $ketqua;
		}
		public function LayKetQuaCamTaiKhoan($idTaiKhoan,$thoiLuongCam){
			$ketqua = false;
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
			
			$sql = "update TaiKhoan set thoiLuongCam=$thoiLuongCam where idTaiKhoan = $idTaiKhoan";
			
			if ($conn->query($sql) === TRUE) {
				$ketqua = true;
			}
			
			return $ketqua;
		}
		
		public function LayKetQuaDoiMatKhau($idTaiKhoan,$matKhauCu,$matKhauMoi,$nhapLaiMatKhauMoi){
			$ketqua = false;
			if($matKhauCu != $_SESSION['matKhau'] || $matKhauMoi != $nhapLaiMatKhauMoi){
				return $ketqua;
			}
			else{
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
				$sql = "update TaiKhoan set matKhau=$matKhauMoi where idTaiKhoan = $idTaiKhoan";
				if ($conn->query($sql) === TRUE) {
					$ketqua = true;
				}
				return $ketqua;
			}
		}
		
		public function LayKetQuaCapNhatHoSo($idTaiKhoan,$tenHienThi,$diaChi,$soDienThoai){
			
			if(isset($_FILES['avatar']) && $_FILES['avatar']['error'] == 0){
				$target_dir = "Assets/Image/Avatar/Member";
				$target_file = $target_dir . basename($_FILES["avatar"]["name"]);
				$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
				$newfilename = "/$idTaiKhoan.jpg";
				$target_path = $target_dir . $newfilename;
				move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_path);
				
				$ketqua = false;
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
			
				$sql = "update TaiKhoan set tenHienThi='$tenHienThi',diaChi = '$diaChi',soDienThoai=$soDienThoai,avatar='Assets/Image/Avatar/Member$newfilename'  where idTaiKhoan = $idTaiKhoan";
			
				if ($conn->query($sql) === TRUE) {
					$ketqua = true;
					$_SESSION['avatar'] = "Assets/Image/Avatar/Member$newfilename";
					$_SESSION['diaChi'] = $diaChi;
					$_SESSION['soDienThoai'] = $soDienThoai;
					header("Cache-Control: no-cache, must-revalidate");
				}
				return $ketqua;
				
			}
		}
	}
?>