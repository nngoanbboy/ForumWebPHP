<?php
	class DangNhapController{
		public function DangNhap(){
			
			$email = $_POST['email'];
			$matKhau = $_POST['password'];
			
			require_once('models/DangNhapModel.php');
			$dangNhapModel = new DangNhapModel();
			$ketqua = $dangNhapModel->LayKetQuaDangNhap($email,$matKhau);
			
			require_once('views/DangNhapView.php');
			$dangNhapView = new DangNhapView();
			$dangNhapView->HienThiKetQuaDangNhap($ketqua);
		}
	}
?>