<?php
	if (isset($_POST['form']) && $_POST['form'] == 'submitted') {
		
		
		
		// Form 1 was submitted
		require_once('controllers/QuanLyTaiKhoanController.php');
		$quanLyTaiKhoanController = new QuanLyTaiKhoanController();
		$quanLyTaiKhoanController->DoiMatKhau(); 
	}
?>

<h2 align="center" class="mt-4">Đổi mật khẩu</h2>
<div class="container my-5">
<form method="POST" action="doimatkhau.php" class="w-100">
<input type="hidden" name="form" value="submitted">
<label for="matKhauCu">Mật khẩu cũ</label>
<input type="matKhauCu" class="form-control" name="matKhauCu" required id="matKhauCu" placeholder="Nhập mật khẩu cũ" />
<br>
<label for="matKhauMoi">Mật khẩu mới</label>
<input type="matKhauMoi" class="form-control" name="matKhauMoi" required id="matKhauMoi" placeholder="Nhập mật khẩu mới" />
<br>

<label for="nhapLaiMatKhauMoi">Nhập lại mật khẩu mới</label>
<input type="nhapLaiMatKhauMoi" class="form-control" name="nhapLaiMatKhauMoi" required id="nhapLaiMatKhauMoi" placeholder="Nhập lại mật khẩu mới" />

<input type="hidden" name="form1" value="submitted">
<button type="submit" class="btn btn-primary mt-2">Xác nhận</button>
</form>
</div>