<?php
	class BinhLuanController{
		public static function sanitizeInput($input) {
				// Trim whitespace
				$input = trim($input);
    // Remove backslashes
    $input = stripslashes($input);
    // Convert special characters to HTML entities
    $input = htmlspecialchars($input);
    return $input;
}
		public function DangBinhLuan(){
			$idBaiViet = $_GET['id'];
			$idTaiKhoan = $_SESSION['idTaiKhoan'];
			$nd = ($_POST['noiDung']);
			$noiDung = self::sanitizeInput($nd);
			
			require_once('models/BinhLuanModel.php');
			$binhLuanModel = new BinhLuanModel();
			$ketqua = $binhLuanModel->LayKetQuaDangBinhLuan($idBaiViet,$idTaiKhoan,$noiDung);
			
			require_once('views/BinhLuanView.php');
			$binhLuanView = new BinhLuanView();
			$binhLuanView->HienThiKetQuaDangBinhLuan($ketqua);
		}
		public function SuaBinhLuan(){
			$idBinhLuan = $_GET['id'];
			$noiDung = $_POST['noiDung'];
			
			require_once('models/BinhLuanModel.php');
			$binhLuanModel = new BinhLuanModel();
			$ketqua = $binhLuanModel->LayKetQuaSuaBinhLuan($idBinhLuan,$noiDung);
			
			require_once('views/BinhLuanView.php');
			$binhLuanView = new BinhLuanView();
			$binhLuanView->HienThiKetQuaSuaBinhLuan($ketqua);
		}
		public function XoaBinhLuan(){
			$idBinhLuan = $_POST['binhLuanId'];
			
			require_once('models/BinhLuanModel.php');
			$binhLuanModel = new BinhLuanModel();
			$ketqua = $binhLuanModel->LayKetQuaXoaBinhLuan($idBinhLuan);
			
			require_once('views/BinhLuanView.php');
			$binhLuanView = new BinhLuanView();
			$binhLuanView->HienThiKetQuaXoaBinhLuan($ketqua);
		}
		
		public function ThichBinhLuan(){
			$idBinhLuan = $_POST['like'];
			$idTaiKhoan = $_SESSION['idTaiKhoan'];
			
			require_once('models/BinhLuanModel.php');
			$binhLuanModel = new BinhLuanModel();
			$ketqua = $binhLuanModel->LayKetQuaThichBinhLuan($idBinhLuan,$idTaiKhoan);
			
			require_once('views/BinhLuanView.php');
			$binhLuanView = new BinhLuanView();
			$binhLuanView->HienThiKetQuaThichBinhLuan($ketqua);
		}
	}
?>