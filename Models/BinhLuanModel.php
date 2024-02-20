<?php
	class BinhLuanModel{
		public function LayKetQuaDangBinhLuan($idBaiViet,$idTaiKhoan,$noiDung){
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
			
			$sql = "insert into BinhLuan(idBaiViet,idTaiKhoan,noiDung) values($idBaiViet,$idTaiKhoan,'$noiDung')";
			
			if ($conn->query($sql) === TRUE) {
				$ketqua = true;
			}
			
			return $ketqua;
		}
		public function LayKetQuaSuaBinhLuan($idBinhLuan,$noiDung){
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
			
			$sql = "update BinhLuan set noiDung = '$noiDung' where idBinhLuan = $idBinhLuan";
			
			if ($conn->query($sql) === TRUE) {
				$ketqua = true;
			}
			
			return $ketqua;
		}
		public function LayKetQuaXoaBinhLuan($idBinhLuan){
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
			
			$sql = "DELETE FROM ToCaoBinhLuan WHERE idBinhLuan = $idBinhLuan; DELETE FROM TuongTacBinhLuan WHERE idBinhLuan = $idBinhLuan; DELETE FROM BinhLuan WHERE idBinhLuan = $idBinhLuan;";

			if ($conn->multi_query($sql) === TRUE) {
				$ketqua = true;
			}
			
			return $ketqua;
		}
		public function LayKetQuaThichBinhLuan($idBinhLuan,$idNguoiThich){
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
			
			$sql = "select * from TuongTacBinhLuan where idTaiKhoan = $idNguoiThich and idBinhLuan = $idBinhLuan";

			if ($conn->query($sql)->num_rows === 1) {
				$ketqua = false;
				$conn->query("delete from TuongTacBinhLuan where idBinhLuan = $idBinhLuan and idTaiKhoan = $idNguoiThich");
				
			}
			else{
				$ketqua = true;
				$conn->query("insert into TuongTacBinhLuan (idBinhLuan, idTaiKhoan) values ($idBinhLuan,$idNguoiThich)");
			}
			
			return $ketqua;
		}
	}
?>