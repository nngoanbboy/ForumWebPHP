<?php
	class QuanLyDanhMucView{
		public function HienThiKetQuaThemDanhMuc($ketqua){
			if($ketqua == true){
				echo '<div class="container my-5 bg-success text-white"><br><h2 align="center">Thêm danh mục thành công</h2><br></div>';
			}
			else{
				echo '<div class="container my-5 bg-danger text-white"><br><h2 align="center">Thêm danh mục thất bại</h2><br></div>';
			}
		}
		public function HienThiKetQuaSuaDanhMuc($ketqua){
			if($ketqua == true){
				echo '<div class="container my-5 bg-success text-white"><br><h2 align="center">Sửa danh mục thành công</h2><br></div>';
			}
			else{
				echo '<div class="container my-5 bg-danger text-white"><br><h2 align="center">Sửa danh mục thất bại</h2><br></div>';
			}
		}
		public function HienThiKetQuaXoaDanhMuc($ketqua){
			if($ketqua == true){
				echo '<div class="container my-5 bg-success text-white"><br><h2 align="center">Xoá danh mục thành công</h2><br></div>';
			}
			else{
				echo '<div class="container my-5 bg-danger text-white"><br><h2 align="center">Xoá danh mục thất bại</h2><br></div>';
			}
		}
	}
?>