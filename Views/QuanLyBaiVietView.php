<?php
	class QuanLyBaiVietView{
		public function HienThiKetQuaThemBaiViet($ketqua){
			if($ketqua == true){
				echo '<div class="container my-5 bg-success text-white"><br><h2 align="center">Thêm bài viết thành công</h2><br></div>';
			}
			else{
				echo '<div class="container my-5 bg-danger text-white"><br><h2 align="center">Thêm bài viết thất bại</h2><br></div>';
			}
		}
		public function HienThiKetQuaSuaBaiViet($ketqua){
			if($ketqua == true){
				echo '<div class="container my-5 bg-success text-white"><br><h2 align="center">Sửa bài viết thành công</h2><br></div>';
			}
			else{
				echo '<div class="container my-5 bg-danger text-white"><br><h2 align="center">Sửa bài viết thất bại</h2><br></div>';
			}
		}
		public function HienThiKetQuaXoaBaiViet($ketqua){
			if($ketqua == true){
				echo '<div class="container my-5 bg-success text-white"><br><h2 align="center">Xoá bài viết thành công</h2><br></div>';
			}
			else{
				echo '<div class="container my-5 bg-danger text-white"><br><h2 align="center">Xoá bài viết thất bại</h2><br></div>';
			}
		}
		public function HienThiKetQuaTimKiemBaiViet($baiviet){
				require_once('Templates/TimKiemBaiViet.php');
		}
		public function HienThiKetQuaThichBaiViet($ketqua){
			if($ketqua == true){
				echo '<div class="container my-5 bg-success text-white"><br><h2 align="center">Thích bài viết</h2><br></div>';
				//header("Location: ");
			}
			else{
				echo '<div class="container my-5 bg-danger text-white"><br><h2 align="center">Bỏ thích bài viết</h2><br></div>';
			}
		}
	}
?>