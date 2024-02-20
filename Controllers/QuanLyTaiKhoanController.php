<?php
	class QuanLyTaiKhoanController{
		public function PhanQuyen(){
			$idTaiKhoan = $_POST['id'];
			$capBac = $_POST['capBac'];
			
			
			require_once('models/QuanLyTaiKhoanModel.php');
			$quanLyTaiKhoanModel = new QuanLyTaiKhoanModel();
			$ketqua = $quanLyTaiKhoanModel->LayKetQuaPhanQuyen($idTaiKhoan,$capBac);
			
			require_once('views/QuanLyTaiKhoanView.php');
			$quanLyTaiKhoanView = new QuanLyTaiKhoanView();
			$quanLyTaiKhoanView->HienThiKetQuaPhanQuyen($ketqua);
		}
		public function CamTaiKhoan(){
			
			$idTaiKhoan = $_POST['id'];
			$thoiLuongCam = $_POST['thoiLuong'];
			
			require_once('models/QuanLyTaiKhoanModel.php');
			$quanLyTaiKhoanModel = new QuanLyTaiKhoanModel();
			$ketqua = $quanLyTaiKhoanModel->LayKetQuaCamTaiKhoan($idTaiKhoan,$thoiLuongCam);
			
			require_once('views/QuanLyTaiKhoanView.php');
			$quanLyTaiKhoanView = new QuanLyTaiKhoanView();
			$quanLyTaiKhoanView->HienThiKetQuaCamTaiKhoan($ketqua);
		}
		public function DoiMatKhau(){
			
			$idTaiKhoan = $_SESSION['idTaiKhoan'];
			
			$matKhauCu = $_POST['matKhauCu'];
			$matKhauMoi = $_POST['matKhauMoi'];
			$nhapLaiMatKhauMoi = $_POST['nhapLaiMatKhauMoi'];
			
			require_once('models/QuanLyTaiKhoanModel.php');
			$quanLyTaiKhoanModel = new QuanLyTaiKhoanModel();
			$ketqua = $quanLyTaiKhoanModel->LayKetQuaDoiMatKhau($idTaiKhoan,$matKhauCu,$matKhauMoi,$nhapLaiMatKhauMoi);
			
			require_once('views/QuanLyTaiKhoanView.php');
			$quanLyTaiKhoanView = new QuanLyTaiKhoanView();
			$quanLyTaiKhoanView->HienThiKetQuaDoiMatKhau($ketqua);
		}
		
		public function CapNhatHoSo(){
			$idTaiKhoan = $_SESSION['idTaiKhoan'];
			
			$avatar = $_FILES['avatar']['name'];
			$tenHienThi = $_POST['tenHienThi'];
			$diaChi = $_POST['diaChi'];
			$soDienThoai = $_POST['soDienThoai'];
			
			require_once('models/QuanLyTaiKhoanModel.php');
			$quanLyTaiKhoanModel = new QuanLyTaiKhoanModel();
			$ketqua = $quanLyTaiKhoanModel->LayKetQuaCapNhatHoSo($idTaiKhoan,$tenHienThi,$diaChi,$soDienThoai);
			
			require_once('views/QuanLyTaiKhoanView.php');
			$quanLyTaiKhoanView = new QuanLyTaiKhoanView();
			$quanLyTaiKhoanView->HienThiKetQuaCapNhatHoSo($ketqua);
		}
	}
?>