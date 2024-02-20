<?php
	class TaiKhoanModel{
		public function getTaiKhoan(){
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
			$result = $conn->query('select idTaiKhoan,email from TaiKhoan');
			$danhsachtaikhoan = array();
			
			if($result->num_rows > 0){
				while($taikhoan = mysqli_fetch_assoc($result)){
					$danhsachtaikhoan[] = $taikhoan;
				}
			}
			return $danhsachtaikhoan;
		}
	}
?>