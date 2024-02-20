<?php

	class TaiKhoanController{
		public function getTaiKhoan(){
			require_once('models/TaiKhoanModel.php');
			$taiKhoanModel = new TaiKhoanModel();
			$danhsachtaikhoan = $taiKhoanModel->getTaiKhoan();
			
			print_r($danhsachtaikhoan);
			
			require_once('views/TaiKhoanView.php');
			$taiKhoanView = new TaiKhoanView();
			$taiKhoanView->showAllTaiKhoan($danhsachtaikhoan);
		}
	}

?>