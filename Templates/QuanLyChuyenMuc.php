<?php
	if (isset($_POST['form1']) && $_POST['form1'] == 'submitted') {
		// Form 1 was submitted
		require_once('controllers/QuanLyChuyenMucController.php');
		$quanLyChuyenMucController = new QuanLyChuyenMucController();
		$quanLyChuyenMucController->ThemChuyenMuc(); 
	}
	if (isset($_POST['form2']) && $_POST['form2'] == 'submitted') {
		// Form 2 was submitted
		require_once('controllers/QuanLyChuyenMucController.php');
		$quanLyChuyenMucController = new QuanLyChuyenMucController();
		if(isset($_POST['delete'])){
			$quanLyChuyenMucController->XoaChuyenMuc(); 
		}
		if(isset($_POST['update'])){
			$quanLyChuyenMucController->SuaChuyenMuc();
		}
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

?>
<h2 align="center" class="mt-5">Quản lý chuyên mục</h2>
<div class="container my-5">
<form method="POST" action="quanlychuyenmuc.php">
<h3>Thêm chuyên mục</h3>
<label for="tieuDe">Tiêu đề</label>
<input type="tieuDe" class="form-control" name="tieuDe" required id="tieuDe" placeholder="Nhập tiêu đề" />
<input type="hidden" name="form1" value="submitted">
<button type="submit" class="btn btn-primary mt-2">Xác nhận</button>
</form>
</div>

<div class="container my-5">

<table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Tiêu Đề</th>
	  <th scope="col"> Xử lý</th>
    </tr>
  </thead>
  <tbody>
	<?php
		foreach($datas as $data){
			echo '<tr>
				<th class="w-50">'.$data['idChuyenMuc'].'</th>
				<td class="w-50">'.$data['tieuDe'].'</td>
				<td>
				<form method="post" action="quanlychuyenmuc.php">
				<input type="hidden" name="form2" value="submitted">
				<input type="hidden" name="id" value="'.$data['idChuyenMuc'].'">
				<input type="text" name="tieuDe" placeholder="Nhập tiêu đề để sửa" class="mb-1">
				<button type="submit" name="update" class="btn btn-success">Sửa</button>
				<button type="submit" name="delete" class="btn btn-danger">Xoá</button></td>
				</form>
				</tr>';
		}
	?>
  </tbody>
</table>
</div>