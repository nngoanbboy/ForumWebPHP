<?php
	class TocaoView{
		public function HienThiKetQuaTocaobaiviet($ketqua){
			if($ketqua == true){
				echo '<div class="container my-5 bg-success text-white"><br><h2 align="center">Tố cáo thành công</h2><br></div>';
			}
			else{
				echo '<div class="container my-5 bg-danger text-white"><br><h2 align="center">Tố cáo thất bại</h2><br></div>';
			}
		}
		public function HienThiKetQuaTocaobinhluan($ketqua){
			if($ketqua == true){
				echo '<div class="container my-5 bg-success text-white"><br><h2 align="center">Tố cáo thành công</h2><br></div>';
			}
			else{
				echo '<div class="container my-5 bg-danger text-white"><br><h2 align="center">Tố cáo thất bại</h2><br></div>';
			}
		}
	
	}
?>