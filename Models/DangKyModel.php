<?php
	class DangKyModel{
		public function LayKetQuaDangKy($email,$matKhau,$tenHienThi,$gioiTinh,$ngaySinh){
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
			$sql = "INSERT INTO TaiKhoan (email,matKhau,tenHienThi,gioiTinh,ngaySinh) VALUES('$email','$matKhau','$tenHienThi',$gioiTinh,'$ngaySinh')";
			
			if($conn->query($sql) === true){
				$ketqua = true;
			}
			
			return $ketqua;
		}
	}
?>