<?php
	class QuanLyBaiVietController{		
		public function ThemBaiViet(){
			$idDanhMuc = $_POST['idDanhMuc'];
			$tieuDe = $_POST['tieuDe'];
            $noiDung = $_POST['noiDung'];
			$idTaiKhoan = $_SESSION['idTaiKhoan'];
			
			require_once('models/QuanLyBaiVietModel.php');
			$quanLyBaiVietModel = new QuanLyBaiVietModel();

			$ketqua = $quanLyBaiVietModel->LayKetQuaThemBaiViet($idDanhMuc,$idTaiKhoan,$tieuDe,$noiDung);
			
			require_once('views/QuanLyBaiVietView.php');
			$quanLyBaiVietView = new QuanLyBaiVietView();
			$quanLyBaiVietView->HienThiKetQuaThemBaiViet($ketqua);
		}
		public function SuaBaiViet(){			
			$idBaiViet = $_POST['idBaiViet'];
			$tieuDe = $_POST['tieuDe'];
            $noiDung = $_POST['noiDung'];
			
			require_once('models/QuanLyBaiVietModel.php');
			$quanLyBaiVietModel = new QuanLyBaiVietModel();
			$ketqua = $quanLyBaiVietModel->LayKetQuaSuaBaiViet($idBaiViet,$tieuDe,$noiDung);
			
			require_once('views/QuanLyBaiVietView.php');
			$quanLyBaiVietView = new QuanLyBaiVietView();
			$quanLyBaiVietView->HienThiKetQuaSuaBaiViet($ketqua);
		}
		public function XoaBaiViet(){
            $idBaiViet = $_POST['idBaiViet'];
			
			require_once('models/QuanLyBaiVietModel.php');
			$quanLyBaiVietModel = new QuanLyBaiVietModel();
			$ketqua = $quanLyBaiVietModel->LayKetQuaXoaBaiViet($idBaiViet);
			
			require_once('views/QuanLyBaiVietView.php');
			$quanLyBaiVietView = new QuanLyBaiVietView();
			$quanLyBaiVietView->HienThiKetQuaXoaBaiViet($ketqua);
		}
		public function SuaBaiVietBanThan(){	
					
			$idBaiViet = $_GET['id'];
			$tieuDe = $_POST['tieuDe'];
            $noiDung = $_POST['noiDung'];
			
			require_once('models/QuanLyBaiVietModel.php');
			$quanLyBaiVietModel = new QuanLyBaiVietModel();
			$ketqua = $quanLyBaiVietModel->LayKetQuaSuaBaiViet($idBaiViet,$tieuDe,$noiDung);
			
			require_once('views/QuanLyBaiVietView.php');
			$quanLyBaiVietView = new QuanLyBaiVietView();
			$quanLyBaiVietView->HienThiKetQuaSuaBaiViet($ketqua);
		}
		public function XoaBaiVietBanThan(){
            $idBaiViet = $_GET['id'];
			
			require_once('models/QuanLyBaiVietModel.php');
			$quanLyBaiVietModel = new QuanLyBaiVietModel();
			$ketqua = $quanLyBaiVietModel->LayKetQuaXoaBaiViet($idBaiViet);
			
			require_once('views/QuanLyBaiVietView.php');
			$quanLyBaiVietView = new QuanLyBaiVietView();
			$quanLyBaiVietView->HienThiKetQuaXoaBaiViet($ketqua);
		}
		public function DangBaiViet(){
			$idDanhMuc = $_GET['id'];
			$tieuDe = $_POST['tieuDe'];
            $noiDung = $_POST['noiDung'];
			$idTaiKhoan = $_SESSION['idTaiKhoan'];
			
			require_once('models/QuanLyBaiVietModel.php');
			$quanLyBaiVietModel = new QuanLyBaiVietModel();

			$ketqua = $quanLyBaiVietModel->LayKetQuaThemBaiViet($idDanhMuc,$idTaiKhoan,$tieuDe,$noiDung);
			
			require_once('views/QuanLyBaiVietView.php');
			$quanLyBaiVietView = new QuanLyBaiVietView();
			$quanLyBaiVietView->HienThiKetQuaThemBaiViet($ketqua);
		}
		
		public function TimKiemBaiViet(){
			$tieuDe = $_POST['tieuDe'];
			require_once('models/QuanLyBaiVietModel.php');
			$quanLyBaiVietModel = new QuanLyBaiVietModel();

			$baiviet = $quanLyBaiVietModel->LayKetQuaTimKiemBaiViet($tieuDe);
			
			require_once('views/QuanLyBaiVietView.php');
			$quanLyBaiVietView = new QuanLyBaiVietView();
			$quanLyBaiVietView->HienThiKetQuaTimKiemBaiViet($baiviet);
			
		}
		public function ThichBaiViet(){
			$idBaiViet = $_POST['likebv'];
			$idTaiKhoan = $_SESSION['idTaiKhoan'];
			
			require_once('models/QuanLyBaiVietModel.php');
			$quanLyBaiVietModel = new QuanLyBaiVietModel();

			$baiviet = $quanLyBaiVietModel->LayKetQuaThichBaiViet($idBaiViet,$idTaiKhoan);
			
			require_once('views/QuanLyBaiVietView.php');
			$quanLyBaiVietView = new QuanLyBaiVietView();
			$quanLyBaiVietView->HienThiKetQuaThichBaiViet($baiviet);
		}
	}
?>