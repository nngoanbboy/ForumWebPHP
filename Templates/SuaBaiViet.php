<?php
	if (isset($_POST['form']) && $_POST['form'] == 'submitted') {
		// Form 1 was submitted
		require_once('controllers/QuanLyBaiVietController.php');
		$quanLyBaiVietController = new QuanLyBaiVietController();
		$quanLyBaiVietController->SuaBaiVietBanThan(); 
	}
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "4rum";
	
	$idBaiViet = $_GET['id'];
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	
	$sql = "SELECT * from BaiViet join TaiKhoan on BaiViet.idTaiKhoan = TaiKhoan.idTaiKhoan where idBaiViet = $idBaiViet";
	$result = $conn->query($sql);
	
	$baiviet = null;
	
	if (mysqli_num_rows($result) > 0) {
		$baiviet = mysqli_fetch_assoc($result);
	}
	
?>

<div class="container">
    <div class="container-fluid p-0">
		<div class="row">
			
			<div class="col-xl-12">
			<form method="post">
				<input type="hidden" name="form" value="submitted">
				<div class="card">
					<div class="card-header pb-0 bg-dark text-light">
						<h5 class="card-title mb-0">Sửa bài viết</h5>
					</div>
					<div class="card-body">
						<input type="text" class="col-xl-12 form-control form-control-lg" id="tieuDe" name="tieuDe" placeholder="Tiêu đề bài viết" required height="150px">
					</div>
					<div class="card-body">
						<div class="form-control">
							<ul class="navbar-nav ml-auto">
								<li class="nav-item active">
									<button class="bold-button" onClick="boldText()"><strong>B</strong></button>
									<button class="italic-button"><i>I</i></button>
									<select>
										<option selected>Font size</option>
										<option>12</option>
										<option>14</option>
										<option>16</option>
										<option>18</option>
									</select>
								</li>
							</ul>
						</div>
						
						<div>
							<textarea type="text" style="height: 500px;" class="col-xl-12 form-control form-control-lg" id="noiDung" name="noiDung" required placeholder="Nội dung bài viết"></textarea>
						</div>
					</div>
					
				
				</div>
				<button  type="submit" class="btn btn-primary mt-2">Xác nhận</button> 
				
				</form>
				<br><br>
				
				
			</div>


		</div>

	</div>
</div>
<script>
	function boldText(){
		var textarea = document.getElementById("noiDung");
		var selectedText = textarea.value.substring(textarea.selectionStart, textarea.selectionEnd);
		var boldText = "<b>" + selectedText + "</b>";
		var newText = textarea.value.substring(0, textarea.selectionStart) + boldText + textarea.value.substring(textarea.selectionEnd);
		textarea.value = newText;
	}
	function italicText(){
		
	}
</script>