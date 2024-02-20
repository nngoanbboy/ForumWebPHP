<?php
	class QuanLyDanhMucController{
		public function ThemDanhMuc(){
			$idChuyenMuc = $_POST['idChuyenMuc'];
			$tieuDe = $_POST['tieuDe'];
			
			require_once('models/QuanLyDanhMucModel.php');
			$quanLyDanhMucModel = new QuanLyDanhMucModel();
			$ketqua = $quanLyDanhMucModel->LayKetQuaThemDanhMuc($idChuyenMuc,$tieuDe);
			
			require_once('views/QuanLyDanhMucView.php');
			$quanLyDanhMucView = new QuanLyDanhMucView();
			$quanLyDanhMucView->HienThiKetQuaThemDanhMuc($ketqua);
		}
		public function SuaDanhMuc(){
			$idChuyenMuc = $_POST['idChuyenMuc'];
			$idDanhMuc = $_POST['idDanhMuc'];
			$tieuDe = $_POST['tieuDe'];
			
			require_once('models/QuanLyDanhMucModel.php');
			$quanLyDanhMucModel = new QuanLyDanhMucModel();
			$ketqua = $quanLyDanhMucModel->LayKetQuaSuaDanhMuc($idDanhMuc,$tieuDe);
			
			require_once('views/QuanLyDanhMucView.php');
			$quanLyDanhMucView = new QuanLyDanhMucView();
			$quanLyDanhMucView->HienThiKetQuaSuaDanhMuc($ketqua);
		}
		public function XoaDanhMuc(){
			
			$idChuyenMuc = $_POST['idChuyenMuc'];
			$idDanhMuc = $_POST['idDanhMuc'];
			
			require_once('models/QuanLyDanhMucModel.php');
			$quanLyDanhMucModel = new QuanLyDanhMucModel();
			$ketqua = $quanLyDanhMucModel->LayKetQuaXoaDanhMuc($idDanhMuc);
			
			require_once('views/QuanLyDanhMucView.php');
			$quanLyDanhMucView = new QuanLyDanhMucView();
			$quanLyDanhMucView->HienThiKetQuaXoaDanhMuc($ketqua);
		}
	}
?>