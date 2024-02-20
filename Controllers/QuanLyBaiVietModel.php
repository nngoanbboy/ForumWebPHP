<?php
	class QuanLyBaiVietModel{
		
		public function LayKetQuaThemBaiViet($idDanhMuc,$tieuDe,$noiDung){
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
			
			$sql = "insert into BaiViet(idDanhMuc,tieuDe,noiDung,luotXem) values($idDanhMuc,'$tieuDe','$noiDung',0)";
			
			if ($conn->query($sql) === TRUE) {
				$ketqua = true;
			}
			
			return $ketqua;
		}
		public function LayKetQuaSuaBaiViet($idBaiViet,$tieuDe,$noiDung){
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
			
			$sql = "update BaiViet set tieuDe='$tieuDe', noiDung='$noiDung' where idBaiViet=$idBaiViet;";

			if ($conn->query($sql) === TRUE) {
				$ketqua = true;
			}
			return $ketqua;
		}
		public function LayKetQuaXoaBaiViet($idBaiViet){
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
			
			$sql = "delete from BaiViet where idBaiViet=$idBaiViet";
			
			if ($conn->query($sql) === TRUE) {
				$ketqua = true;
			}
			
			return $ketqua;
		}
	}
?>