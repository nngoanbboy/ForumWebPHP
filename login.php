<?php
	include 'header.php';
	if($_SERVER['REQUEST_METHOD'] === 'POST'){
		require_once('controllers/DangNhapController.php');
		$dangNhapController = new DangNhapController();
		$dangNhapController->DangNhap();
	}
?>

<div class="container my-5">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="card">
            <div class="card-header bg-dark text-light">
              Đăng nhập
            </div>
            <div class="card-body">
              <form method="POST" action="login.php">
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" class="form-control" name="email" required id="email" placeholder="Nhập email" />
                </div>
                <div class="form-group">
                  <label for="password">Mật khẩu</label>
                  <input type="password" class="form-control" name="password" required id="password" placeholder="Nhập mật khẩu"/>
                </div>
                <button type="submit" class="btn bg-dark text-light">Xác nhận</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>