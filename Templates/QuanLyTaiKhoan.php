<?php
	if (isset($_POST['form1']) && $_POST['form1'] == 'submitted') {
		// Form 1 was submitted
		require_once('controllers/QuanLyTaiKhoanController.php');
		$quanLyTaiKhoanController = new QuanLyTaiKhoanController();
		$quanLyTaiKhoanController->PhanQuyen();
	}
	if (isset($_POST['form2']) && $_POST['form2'] == 'submitted') {
		// Form 2 was submitted
		require_once('controllers/QuanLyTaiKhoanController.php');
		$quanLyTaiKhoanController = new QuanLyTaiKhoanController();
		$quanLyTaiKhoanController->CamTaiKhoan();
	}

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "4rum";
	
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	
	$sql = "SELECT * from ChuyenMuc";
	$result = $conn->query($sql);
	
	$datas = array();
	
	if (mysqli_num_rows($result) > 0) {
		while($row = mysqli_fetch_assoc($result)) {
			$datas[] = $row;
		}
	}
	
	$sql = "Select * from TaiKhoan";
	$result = $conn->query($sql);
	
	$datas = array();
	
	if(mysqli_num_rows($result) > 0){
		while($row = mysqli_fetch_assoc($result)){
			$datas[] = $row;
		}
	}

?>

<h2 align="center" class="mt-5">Quản lý tài khoản</h2>
<div class="container my-5">
<table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Email</th>
	  <th scope="col">Cấp bậc</th>
	  <th scope="col">Thời gian cấm</th>
	  <th scope="col"> Xử lý</th> 
    </tr>
  </thead>
  <tbody>
	<?php
		foreach($datas as $data){
			if($data['capBac'] != 10){
				$quyen="Member";
			}
			else $quyen="Administrator";
			echo '<tr>
				<th class="w-25">'.$data['idTaiKhoan'].'</th>
				<td class="w-25">'.$data['email'].'</td>
				<td class="w-25">'.$quyen.'</td>
				<td class="w-25">'.$data['thoiLuongCam'].'</td>
				<td>
				<form method="post" action="quanlytaikhoan.php">
				<input type="hidden" name="form1" value="submitted">
				<input type="hidden" name="id" value="'.$data['idTaiKhoan'].'">
				<select name="capBac" id="capBac">
					<option value="1">Member</option>
					<option value="10">Administrator</option>
				</select>
				<button type="submit" name="update" class="btn btn-primary mt-1">Phân quyền</button>
				
				</form>
				
				<form method="post" action="quanlytaikhoan.php">
					<input type="hidden" name="form2" value="submitted">
					<input type="hidden" name="id" value="'.$data['idTaiKhoan'].'">
					<input type="number" name="thoiLuong" placeholder="Nhập thời lượng cấm" class="mt-2 mb-1">
					<button type="submit" name="delete" class="btn btn-danger">Cấm tài khoản</button></td>
				</form>
				</tr>';
		}
	?>
  </tbody>
</table>
</div>