<?php
	class DangNhapModel{
		public function LayKetQuaDangNhap($email,$matKhau){
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
			
			$sql = "SELECT * from TaiKhoan";
			$result = $conn->query($sql);
			
			if($result->num_rows > 0){
				while($row = $result->fetch_assoc()){
					if($email == $row['email'] && $matKhau == $row['matKhau']){
						$ketqua = true;
						session_start();
						$_SESSION['idTaiKhoan'] = $row['idTaiKhoan'];
						$_SESSION['email'] = $email;
						$_SESSION['matKhau'] = $row['matKhau'];
						$_SESSION['tenHienThi'] = $row['tenHienThi'];
						$_SESSION['gioiTinh'] = $row['gioiTinh'];
						$_SESSION['ngaySinh'] = $row['ngaySinh'];
						$_SESSION['diaChi'] = $row['diaChi'];
						$_SESSION['soDienThoai'] = $row['soDienThoai'];
						$_SESSION['avatar'] = $row['avatar'];
						$_SESSION['capBac'] = $row['capBac'];
						$_SESSION['trangThaiTaiKhoan'] = $row['trangThaiTaiKhoan'];
						$_SESSION['thoiLuongCam'] = $row['thoiLuongCam'];
						break;
					}
				}
			}
			return $ketqua;
		}
	}
?>