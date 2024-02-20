<?php
	class QuanLyChuyenMucView{
		public function HienThiKetQuaThemChuyenMuc($ketqua){
			if($ketqua == true){
				echo '<div class="container my-5 bg-success text-white"><br><h2 align="center">Thêm chuyên mục thành công</h2><br></div>';
			}
			else{
				echo '<div class="container my-5 bg-danger text-white"><br><h2 align="center">Thêm chuyên mục thất bại</h2><br></div>';
			}
		}
		public function HienThiKetQuaSuaChuyenMuc($ketqua){
			if($ketqua == true){
				echo '<div class="container my-5 bg-success text-white"><br><h2 align="center">Sửa chuyên mục thành công</h2><br></div>';
			}
			else{
				echo '<div class="container my-5 bg-danger text-white"><br><h2 align="center">Sửa chuyên mục thất bại</h2><br></div>';
			}
		}
		public function HienThiKetQuaXoaChuyenMuc($ketqua){
			if($ketqua == true){
				echo '<div class="container my-5 bg-success text-white"><br><h2 align="center">Xoá chuyên mục thành công</h2><br></div>';
			}
			else{
				echo '<div class="container my-5 bg-danger text-white"><br><h2 align="center">Xoá chuyên mục thất bại</h2><br></div>';
			}
		}
		
	}
?>