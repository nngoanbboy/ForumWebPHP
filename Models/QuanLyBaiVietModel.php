<?php
	class QuanLyBaiVietModel{
		
		public function LayKetQuaThemBaiViet($idDanhMuc,$idTaiKhoan,$tieuDe,$noiDung){
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
			
			$sql = "insert into BaiViet(idDanhMuc,idTaiKhoan,tieuDe,noiDung,luotXem) values($idDanhMuc,$idTaiKhoan,'$tieuDe','$noiDung',0)";
			
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
    
	$sql = "DELETE FROM ToCaoBaiViet WHERE idBaiViet=$idBaiViet; DELETE FROM TuongTacBaiViet WHERE idBaiViet=$idBaiViet; DELETE FROM BaiViet WHERE idBaiViet=$idBaiViet";

	if ($conn->multi_query($sql) === TRUE) {
		$ketqua = true;
	}
    
    return $ketqua;
}
		
		public function LayKetQuaTimKiemBaiViet($tieuDe){
			
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
			
			$sql = "SELECT * FROM BaiViet where tieuDe like '%{$tieuDe}%'";
			
			$baiviet = array();
			
			$result = $conn->query($sql);
			
			if($result->num_rows > 0){
				while($taikhoan = mysqli_fetch_assoc($result)){
					$baiviet[] = $taikhoan;
				}
			}
			
			return $baiviet;
			
		}
		public function LayKetQuaThichBaiViet($idBaiViet,$idNguoiThich){
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
			
			$sql = "select * from TuongTacBaiViet where idTaiKhoan = $idNguoiThich and idBaiViet = $idBaiViet";

			if ($conn->query($sql)->num_rows === 1) {
				$ketqua = false;
				$conn->query("delete from TuongTacBaiViet where idBaiViet = $idBaiViet and idTaiKhoan = $idNguoiThich");
				
			}
			else{
				$ketqua = true;
				$conn->query("insert into TuongTacBaiViet (idBaiViet, idTaiKhoan) values ($idBaiViet,$idNguoiThich)");
			}
			
			return $ketqua;
		}
	}
?>