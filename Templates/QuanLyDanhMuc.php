<?php
	if (isset($_POST['form1']) && $_POST['form1'] == 'submitted') {
		// Form 1 was submitted
		require_once('controllers/QuanLyDanhMucController.php');
		$quanLyDanhMucController = new QuanLyDanhMucController();
		$quanLyDanhMucController->ThemDanhMuc(); 
	}
	if (isset($_POST['form2']) && $_POST['form2'] == 'submitted') {
		// Form 2 was submitted
		require_once('controllers/QuanLyDanhMucController.php');
		$quanLyDanhMucController = new QuanLyDanhMucController();
		if(isset($_POST['delete'])){
			$quanLyDanhMucController->XoaDanhMuc(); 
		}
		if(isset($_POST['update'])){
			$quanLyDanhMucController->SuaDanhMuc();
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
	
	$sql = "Select * from DanhMuc";
	$result = $conn->query($sql);
	
	$danhmuc = array();
	
	if(mysqli_num_rows($result) > 0){
		while($row = mysqli_fetch_assoc($result)){
			$danhmuc[] = $row;
		}
	}

?>
<h2 align="center" class="mt-5">Quản lý danh mục</h2>
<div class="container my-5">
<form method="POST" action="quanlydanhmuc.php">
<h3>Thêm danh mục vào chuyên mục</h3>
<label for="idChuyenMuc">ID Chuyên mục</label>
<input type="idChuyenMuc" class="form-control" name="idChuyenMuc" required id="idChuyenMuc" placeholder="Nhập id chuyên mục" />
<br>
<label for="tieuDe">Tiêu đề danh mục</label>
<input type="tieuDe" class="form-control" name="tieuDe" required id="tieuDe" placeholder="Nhập tiêu đề" />
<input type="hidden" name="form1" value="submitted">
<button type="submit" class="btn btn-primary mt-2">Xác nhận</button>
</form>
</div>

<div class="container my-5">

<?php
	foreach($datas as $data){
		echo '
			<table class="table">
				<thead class="thead-light">
					<tr>
						<th scope="col">ID Chuyên mục: '.$data['idChuyenMuc'].'</th>
						<th scope="col">Tiêu đề chuyên mục: '.$data['tieuDe'].'</th>
						<th scope="col">Xử lý</th>
					</tr>
				</thead>
				<tbody>
					';
					foreach($danhmuc as $dm){
						if($dm['idChuyenMuc'] == $data['idChuyenMuc']){
							
						
						echo '
						<tr>
							<th class="w-50">'.$dm['idDanhMuc'].'</th>
							<th class="w-50">'.$dm['tieuDe'].'</th>
							<th><form method="post" action="quanlydanhmuc.php">
							<input type="hidden" name="form2" value="submitted">
							<input type="hidden" name="idChuyenMuc" value="'.$data['idChuyenMuc'].'">
							<input type="hidden" name="idDanhMuc" value="'.$dm['idDanhMuc'].'">
							<input type="text" name="tieuDe" placeholder="Nhập tiêu đề để sửa" class="mb-1">
							<button type="submit" name="update" class="btn btn-success">Sửa</button>
							<button type="submit" name="delete" class="btn btn-danger">Xoá</button></th>
							</form>
						</tr>
						';
						}
					}
		echo '				
				</tbody>
			</table>
		';
	}
?>

</div>