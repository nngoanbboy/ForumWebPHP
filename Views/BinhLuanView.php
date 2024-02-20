<?php
	class BinhLuanView{
		public function HienThiKetQuaDangBinhLuan($ketqua){
			if($ketqua == true){
				echo '<div class="container my-5 bg-success text-white"><br><h2 align="center">Thêm bình luận thành công</h2><br></div>';
			}
			else{
				echo '<div class="container my-5 bg-danger text-white"><br><h2 align="center">Thêm bình luận thất bại</h2><br></div>';
			}
		}
		public function HienThiKetQuaSuaBinhLuan($ketqua){
			if($ketqua == true){
				echo '<div class="container my-5 bg-success text-white"><br><h2 align="center">Sửa bình luận thành công</h2><br></div>';
				//header("Location: ");
			}
			else{
				echo '<div class="container my-5 bg-danger text-white"><br><h2 align="center">Sửa bình luận thất bại</h2><br></div>';
			}
		}
		public function HienThiKetQuaXoaBinhLuan($ketqua){
			if($ketqua == true){
				echo '<div class="container my-5 bg-success text-white"><br><h2 align="center">Xoá bình luận thành công</h2><br></div>';
				//header("Location: ");
			}
			else{
				echo '<div class="container my-5 bg-danger text-white"><br><h2 align="center">Xoá bình luận thất bại</h2><br></div>';
			}
		}
		public function HienThiKetQuaThichBinhLuan($ketqua){
			if($ketqua == true){
				echo '<div class="container my-5 bg-success text-white"><br><h2 align="center">Thích bình luận</h2><br></div>';
				//header("Location: ");
			}
			else{
				echo '<div class="container my-5 bg-danger text-white"><br><h2 align="center">Bỏ thích bình luận</h2><br></div>';
			}
		}
	}
?>