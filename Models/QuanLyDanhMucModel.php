<?php
	class QuanLyDanhMucModel{
		public function LayKetQuaThemDanhMuc($idChuyenMuc,$tieuDe){
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
			
			$sql = "insert into DanhMuc(idChuyenMuc,tieuDe) values($idChuyenMuc,'$tieuDe')";
			
			if ($conn->query($sql) === TRUE) {
				$ketqua = true;
			}
			
			return $ketqua;
		}
		public function LayKetQuaSuaDanhMuc($idDanhMuc,$tieuDe){
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
			
			$sql = "update DanhMuc set tieuDe='$tieuDe' where idDanhMuc=$idDanhMuc";
			
			if ($conn->query($sql) === TRUE) {
				$ketqua = true;
			}
			
			return $ketqua;
		}
		public function LayKetQuaXoaDanhMuc($idDanhMuc){
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
			
			$sql = "delete from DanhMuc where idDanhMuc=$idDanhMuc";
			
			if ($conn->query($sql) === TRUE) {
				$ketqua = true;
			}
			
			return $ketqua;
		}
	}
?>