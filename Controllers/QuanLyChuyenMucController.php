<?php
	class QuanLyChuyenMucController{
		public function ThemChuyenMuc(){
			$tieuDe = $_POST['tieuDe'];
			
			require_once('models/QuanLyChuyenMucModel.php');
			$quanLyChuyenMucModel = new QuanLyChuyenMucModel();
			$ketqua = $quanLyChuyenMucModel->LayKetQuaThemChuyenMuc($tieuDe);
			
			require_once('views/QuanLyChuyenMucView.php');
			$quanLyChuyenMucView = new QuanLyChuyenMucView();
			$quanLyChuyenMucView->HienThiKetQuaThemChuyenMuc($ketqua);
		}
		public function SuaChuyenMuc(){
			$id = $_POST['id'];
			$tieuDe = $_POST['tieuDe'];
			
			require_once('models/QuanLyChuyenMucModel.php');
			$quanLyChuyenMucModel = new QuanLyChuyenMucModel();
			$ketqua = $quanLyChuyenMucModel->LayKetQuaSuaChuyenMuc($id,$tieuDe);
			
			require_once('views/QuanLyChuyenMucView.php');
			$quanLyChuyenMucView = new QuanLyChuyenMucView();
			$quanLyChuyenMucView->HienThiKetQuaSuaChuyenMuc($ketqua);
		}
		
		public function XoaChuyenMuc(){
			$id = $_POST['id'];
			require_once('models/QuanLyChuyenMucModel.php');
			$quanLyChuyenMucModel = new QuanLyChuyenMucModel();
			$ketqua = $quanLyChuyenMucModel->LayKetQuaXoaChuyenMuc($id);
			
			require_once('views/QuanLyChuyenMucView.php');
			$quanLyChuyenMucView = new QuanLyChuyenMucView();
			$quanLyChuyenMucView->HienThiKetQuaXoaChuyenMuc($ketqua);
		}
	}
?>