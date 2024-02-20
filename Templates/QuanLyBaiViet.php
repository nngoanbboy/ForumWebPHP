<?php
	if (isset($_POST['form1']) && $_POST['form1'] == 'submitted') {
		// Form 1 was submitted
		require_once('controllers/QuanLyBaiVietController.php');
		$quanLyBaiVietController = new QuanLyBaiVietController();
		$quanLyBaiVietController->ThemBaiViet(); 
	}
	if (isset($_POST['form2']) && $_POST['form2'] == 'submitted') {
		// Form 2 was submitted
		require_once('controllers/QuanLyBaiVietController.php');
		$quanLyBaiVietController = new QuanLyBaiVietController();
		if(isset($_POST['delete'])){
			$quanLyBaiVietController->XoaBaiViet(); 
		}
		if(isset($_POST['update'])){
			$quanLyBaiVietController->SuaBaiViet();
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
	
	$sql = "SELECT * from DanhMuc";
	$result = $conn->query($sql);
	
	$datas = array();
	
	if (mysqli_num_rows($result) > 0) {
		while($row = mysqli_fetch_assoc($result)) {
			$datas[] = $row;
		}
	}

	$sql = "SELECT * from BaiViet";
	$result = $conn->query($sql);
	
	$baiviet = array();
	
	if (mysqli_num_rows($result) > 0) {
		while($row = mysqli_fetch_assoc($result)) {
			$baiviet[] = $row;
		}
	}

	if(isset($_SESSION['email']) && $_SESSION['email'] != null){
		$nguoidang = $_SESSION['tenHienThi'];
	}
?>
<br>
<h2 align="center" class="mt-4">Quản lý bài viết</h2>
<div class="container my-5">
<form method="POST" action="quanlybaiviet.php" class="w-100">
<input type="hidden" name="form2" value="submitted">
<h3>Thêm bài viết vào danh mục</h3>
<label for="idDanhMuc">ID Danh mục</label>
<input type="idDanhMuc" class="form-control" name="idDanhMuc" required id="idDanhMuc" placeholder="Nhập id danh mục" />
<br>
<label for="tieuDe">Tiêu đề bài viết</label>
<input type="tieuDe" class="form-control" name="tieuDe" required id="tieuDe" placeholder="Nhập tiêu đề" />
<br>

<label for="noiDung">Nội dung bài viết</label>
<input type="noiDung" class="form-control" name="noiDung" required id="noiDung" placeholder="Nhập nội dung" />

<input type="hidden" name="form1" value="submitted">
<button type="submit" class="btn btn-primary mt-2">Xác nhận</button>
</form>
</div>
 
<div class="container my-5 ">

<?php
	foreach($datas as $data){
		echo '
			<table class="table">
				<thead class="thead-light">
					<tr>
						<th scope="col">ID Danh mục: '.$data['idDanhMuc'].'</th>
						<th scope="col">Tiêu đề danh mục: '.$data['tieuDe'].'</th>
						<th scope="col">Người đăng</th>
						<th scope="col">Nội dung bài viết</th>
						<th scope="col">Ngày đăng</th>
						<th scope="col" class="w-10 text-center">Xử lý</th>
					</tr>
				</thead>
				<tbody>
					';
					foreach($baiviet as $bv){
							

						if($bv['idDanhMuc'] == $data['idDanhMuc']){

										$tieuDe = $bv['tieuDe'];
										if (mb_strlen($tieuDe, 'UTF-8') > 50) {
											$tieuDe = mb_substr($tieuDe, 0, 50, 'UTF-8') . ' ...';
										}
										$noiDung = $bv['noiDung'];
										if (mb_strlen($noiDung, 'UTF-8') > 100) {
											$noiDung = mb_substr($noiDung, 0, 100, 'UTF-8') . ' ...';
										}

						echo '
						<tr>
							<td class="w-25 ">'.$bv['idBaiViet'].'</td>						
							<td class="w-25 "><a class="text-dark" href="baiviet.php?id='.$bv['idBaiViet'] .'">'.$tieuDe.'</a></td>
							<td class="w-20 ">'.$nguoidang.'</td>
							<td class="w-25 ">'.$noiDung.'</td>
							<td class="w-25 ">'.$bv['ngayDang'].'</td>
							<th>
							<form method="post" action="quanlybaiviet.php">
							<input type="hidden" name="form2" value="submitted">
							<input type="hidden" name="idDanhMuc" value="'.$data['idDanhMuc'].'">
							<input type="hidden" name="idBaiViet" value="'.$bv['idBaiViet'].'">
								<ul style="list-style: none;">
									<li>
										<input type="text" name="tieuDe" placeholder="Nhập tiêu đề để sửa" class="mb-1"> 																		
									</li>
									<li>
										<input type="text" name="noiDung" placeholder="Nhập nội dung để sửa" class="mt-1 mb-1">								
									</li>
									<li>
										<button type="submit" name="update" class="btn btn-success">Sửa</button>
										<button type="submit" name="delete" class="btn btn-danger">Xoá</button>
									</li>
								</ul>
							</form>	
							</th>
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