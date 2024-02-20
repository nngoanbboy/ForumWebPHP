<?php
	class TocaoController{
		public function Tocaobaiviet(){
			
			$idBaiViet = $_GET['id'];
			$idTaiKhoan = $_SESSION['idTaiKhoan'];
			$noiDung = $_POST['noiDung'];
			
			require_once('models/TocaoModel.php');
			$TocaoModel = new TocaoModel();
			$ketqua = $TocaoModel->LayKetQuaTocaobaiviet($idBaiViet,$idTaiKhoan,$noiDung);
			
			require_once('views/TocaoView.php');
			$TocaoView = new TocaoView();
			$TocaoView->HienThiKetQuaTocaobaiviet($ketqua);
		}
		
		public function Tocaobinhluan(){
			$idBinhLuan = $_POST['binhLuanId'];
			$idTaiKhoan = $_SESSION['idTaiKhoan'];
			$noiDung = $_POST['noiDung'];
			
			require_once('models/TocaoModel.php');
			$TocaoModel = new TocaoModel();
			$ketqua = $TocaoModel->LayKetQuaTocaobinhluan($idBinhLuan,$idTaiKhoan,$noiDung);
			
			require_once('views/TocaoView.php');
			$TocaoView = new TocaoView();
			$TocaoView->HienThiKetQuaTocaobinhluan($ketqua);
		}
    }
    ?>