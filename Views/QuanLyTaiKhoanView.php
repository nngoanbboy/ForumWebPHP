<?php
	class QuanLyTaiKhoanView{
		public function HienThiKetQuaPhanQuyen($ketqua){
			if($ketqua == true){
				echo '<div class="container my-5 bg-success text-white"><br><h2 align="center">Phân quyền thành công</h2><br></div>';
			}
			else{
				echo '<div class="container my-5 bg-danger text-white"><br><h2 align="center">Phân quyền thất bại</h2><br></div>';
			}
		}
		public function HienThiKetQuaCamTaiKhoan($ketqua){
			if($ketqua == true){
				echo '<div class="container my-5 bg-success text-white"><br><h2 align="center">Phân quyền thành công</h2><br></div>';
			}
			else{
				echo '<div class="container my-5 bg-danger text-white"><br><h2 align="center">Phân quyền thất bại</h2><br></div>';
			}
		}
		
		public function HienThiKetQuaDoiMatKhau($ketqua){
			if($ketqua == true){
				echo '<div class="container my-5 bg-success text-white"><br><h2 align="center">Đổi mật khẩu thành công</h2><br></div>';
			}
			else{
				echo '<div class="container my-5 bg-danger text-white"><br><h2 align="center">Đổi mật khẩu thất bại</h2><br></div>';
			}
		}
		public function HienThiKetQuaCapNhatHoSo($ketqua){
			if($ketqua == true){
				echo '<div class="container my-5 bg-success text-white"><br><h2 align="center">Cập nhật hồ sơ thành công</h2><br></div>';
			}
			else{
				echo '<div class="container my-5 bg-danger text-white"><br><h2 align="center">Cập nhật hồ sơ thất bại</h2><br></div>';
			}
		}
	}
?>