<?php
	include 'header.php';
	if($_SERVER['REQUEST_METHOD'] === 'POST'){
		require_once('controllers/DangKyController.php');
		$dangKyController = new DangKyController();
		$dangKyController->DangKy();
	}
?>
<div class="container my-5">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="card">
            <div class="card-header bg-dark text-light">
              Đăng ký thành viên
            </div>
            <div class="card-body">
              <form action="register.php" method="POST">
                <div class="form-group">
                  <label for="name">Tên hiển thị</label>
                  <input type="text" class="form-control" id="name" name="name" required placeholder="Enter name"  />
                </div>
                <div class="form-group">
                  <label for="email">Địa chỉ email</label>
                  <input type="email" class="form-control" id="email" name="email" required placeholder="Enter email" />
                </div>
                <div class="form-group">
                  <label for="password">Mật khẩu</label>
                  <input type="password" class="form-control" id="password" name="password" required placeholder="Nhập mật khẩu" />
                </div>
				<div class="form-group">
                  <label for="password">Xác nhận mật khẩu</label>
                  <input type="password" class="form-control" id="confirmpassword" name="confirmpassword" required placeholder="Nhập lại mật khẩu" />
                </div>
				<div class="form-group">
                  <label for="birthday">Ngày sinh</label>
                  <input type="date" class="form-control" id="birthday" name="birthday" required />
                </div>
				<div class="form-group">
                  <label for="sexchoose">Giới tính</label><br>
                  <input type="radio" id="male" name="sex" value="male" required >
  				  <label for="sex">Nam</label><br>
				  <input type="radio" id="female" name="sex" value="female" required >
  				  <label for="sex">Nữ</label><br>
                </div>
				<div class="form-group">
                  <label for="tnp">Điều khoản và điều kiện</label><br>
                  <input type="checkbox" id="tnp" name="tnp" value="tnp" required >
  				  <label for="tnp">Tôi đồng ý với các điều khoản và điều kiện và chính sách bảo mật</label>
                </div>
                <button type="submit" class="btn bg-dark text-light">Xác nhận</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>