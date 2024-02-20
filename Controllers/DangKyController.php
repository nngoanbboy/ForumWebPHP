<?php
	class DangKyController{
		public function DangKy(){
			
			$email = $_POST['email'];
			$matKhau = $_POST['password'];
			$tenHienThi = $_POST['name'];
			$xacNhanMatKhau = $_POST['confirmpassword'];
			$ngaySinh = $_POST['birthday'];
			if($_POST['sex'] == "male"){
				$gioiTinh = 0;
			}
			else{
				$gioiTinh = 1;
			}
			
			require_once('models/DangKyModel.php');
			$dangKyModel = new DangKyModel();
			$ketqua = $dangKyModel->LayKetQuaDangKy($email,$matKhau,$tenHienThi,$gioiTinh,$ngaySinh);
			
			require_once('views/DangKyView.php');
			$dangKyView = new DangKyView();
			$dangKyView->HienThiKetQuaDangKy($ketqua);
		}
	}
?>