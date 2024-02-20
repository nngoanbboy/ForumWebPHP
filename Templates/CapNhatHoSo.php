<?php
	if (isset($_POST['form']) && $_POST['form'] == 'submitted') {
		// Form 1 was submitted
		require_once('controllers/QuanLyTaiKhoanController.php');
		$quanLyTaiKhoanController = new QuanLyTaiKhoanController();
		$quanLyTaiKhoanController->CapNhatHoSo(); 
	}
?>

<h2 align="center" class="mt-4">Cập nhật hồ sơ</h2>
<div class="container my-5">
<form method="POST" action="capnhathoso.php" enctype="multipart/form-data" class="w-100 ">
<input type="hidden" name="form" value="submitted">

<label for="avatar" class=""></label>
<br>
<?php
	if($_SESSION['avatar'] == NULL){
		if($_SESSION['gioiTinh']==0){
			echo '<img src="Assets/Image/Avatar/Default/male.jpg" width="100px" height="100px">';
		}
		else{
			echo '<img src="Assets/Image/Avatar/Default/female.jpg" width="100px" height="100px">';
		}
	}
	else{
		echo '<img src="'.$_SESSION['avatar'].'" width="100px" height="100px">';
	}
?>
<br>
<input type="file" class="mt-2 mb-4" id="avatar" name="avatar" accept="image/*">
<br>

<label for="tenHienThi">Tên hiển thị</label>
<input type="tenHienThi" class="form-control" name="tenHienThi" value="<?php echo $_SESSION['tenHienThi']; ?>" required id="tenHienThi" placeholder="Nhập id danh mục" />
<br>
<label for="diaChi">Địa chỉ</label>
<input type="diaChi" class="form-control" name="diaChi" value="<?php echo $_SESSION['diaChi']; ?>" required id="diaChi" placeholder="Nhập địa chỉ" />
<br>

<label for="soDienThoai">Số điện thoại</label>
<input type="soDienThoai" class="form-control" name="soDienThoai" value="<?php echo $_SESSION['soDienThoai']; ?>" required id="soDienThoai" placeholder="Nhập số điện thoại" />


<button type="submit" class="btn btn-primary mt-2">Xác nhận</button>
</form>
</div>