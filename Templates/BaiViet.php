<?php
	

	$_SESSION['path'] = $_SERVER['REQUEST_URI'];
	if (isset($_POST['form']) && $_POST['form'] == 'submitted') {
		// Form 1 was submitted
		require_once('Controllers/BinhLuanController.php');
		$binhLuanController = new BinhLuanController();
		$binhLuanController->DangBinhLuan();
	}
	$_SESSION['path'] = $_SERVER['REQUEST_URI'];
	if (isset($_POST['reportbv']) && $_POST['reportbv'] == 'submitted') {
			require_once('Controllers/ToCaoController.php');
			$TocaoController = new TocaoController();
			$TocaoController->Tocaobaiviet();
		}
		$_SESSION['path'] = $_SERVER['REQUEST_URI'];
		if (isset($_POST['reportbl']) && $_POST['reportbl'] == 'submitted') {
				require_once('Controllers/TocaoController.php');
				$TocaoController = new TocaoController();
				$TocaoController->Tocaobinhluan();
			}
	
	if(isset($_POST['deletebv']) && $_POST['deletebv'] == 'submitted' ){
		require_once('Controllers/QuanLyBaiVietController.php');
		$qlbvController = new QuanLyBaiVietController();
		$qlbvController->XoaBaiViet();
	}
	if(isset($_POST['deletebl']) && $_POST['deletebl'] == 'submitted' ){
		require_once('Controllers/BinhLuanController.php');
		$binhLuanController = new BinhLuanController();
		$binhLuanController->XoaBinhLuan();
	}
	
	if(isset($_POST['like'])){
		require_once('Controllers/BinhLuanController.php');
		$binhLuanController = new BinhLuanController();
		$binhLuanController->ThichBinhLuan();
	}
	if(isset($_POST['likebv'])){
		require_once('Controllers/QuanLyBaiVietController.php');
		$qlbvController = new QuanLyBaiVietController();
		$qlbvController->ThichBaiViet();
	}


	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "4rum";
	
	$idBaiViet = $_GET['id'];
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	$sql="Update BaiViet set luotXem = luotXem+1 where idBaiViet = $idBaiViet";
	$result = $conn->query($sql);
	
	$sql = "SELECT * from BaiViet join TaiKhoan on BaiViet.idTaiKhoan = TaiKhoan.idTaiKhoan where idBaiViet = $idBaiViet";
	$result = $conn->query($sql);
	
	$baiviet = null;
	
	if (mysqli_num_rows($result) > 0) {
		$baiviet = mysqli_fetch_assoc($result);
	}
	if($baiviet == null){
		header("location: index.php");
	}
	
	$sql = "SELECT * FROM BinhLuan join TaiKhoan on BinhLuan.idTaiKhoan = TaiKhoan.idTaiKhoan where idBaiViet = $idBaiViet order by ngayDang";
	$result = $conn->query($sql);
	
	$binhluan = array();
	
	if (mysqli_num_rows($result) > 0) {
		while($row = mysqli_fetch_assoc($result)) {
			$binhluan[] = $row;
		}
	}
	
	
	?>
<div class="container">
<section class="blog-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12 left-box mt-4">
                <div class="card single-blog-post">
                    <div class="header ml-3 mr-3 mt-2 mb-3">
                        <?php
						echo '
						<tr><td><p style="font-size:24px;"><a class="text-dark text-decoration-none font-weight-bold" href="baiviet.php?id='.$baiviet['idBaiViet'].'">'.$baiviet['tieuDe'].'</a></p></td></tr>
						<hr>';
						echo '<tr class ="mt-2">';
						if(isset($_SESSION['idTaiKhoan'])){
							echo '<td><button class="btn btn-link btn-sm float-right " data-toggle="modal" data-target="#reportModalbv" data-binhluanid="' . $baiviet['idBaiViet'] . '"><i class="ti-alert text-dark"></i></button></td>';
						}
						if((isset($_SESSION['idTaiKhoan']) && $_SESSION['idTaiKhoan'] == $baiviet['idTaiKhoan']) || (isset($_SESSION['idTaiKhoan']) && $_SESSION['capBac'] == 10)){
							echo '
							

							<td><button class="btn btn-link btn-sm delete-btnbv float-right" data-toggle="modal" data-target="#deleteModalbv" data-binhluanid="' . $baiviet['idBaiViet'] . '"><i class="ti-trash text-dark"></i></button></td>
							
							<td><button class="btn btn-link btn-sm float-right"><a href="suabaiviet.php?id='.$baiviet['idBaiViet'].'"><i class="ti-pencil-alt float-right text-dark"></i></a></button></td>

							';
						}
						echo '</tr>';
						?>
                        <ul class="meta list-inline ml-0 mr-3 mt-2 mb-2">
						<img alt="Bootstrap Image Preview" class="img-thumbnail" width="40px" height="40px" src="<?php 
							if($baiviet['avatar'] != null){
								echo $baiviet['avatar'];
							}
							else{
								if($baiviet['gioiTinh'] == 0){
									echo 'Assets/Image/Avatar/Default/male.jpg';
								}
								else{
									echo 'Assets/Image/Avatar/Default/female.jpg';
								}
							}
						?>" />
							<?php
							echo '
							<li><i class="ti-user"></i> Người đăng: <a href="xemhoso.php?id='.$baiviet['idTaiKhoan'].'">'.$baiviet['tenHienThi'].'</a></li>
							<li><i class="ml-3 ti-eye"></i> Lượt xem: '.$baiviet['luotXem'].'</li>
							<li><i class="ml-3 ti-calendar"></i> Ngày đăng: '.$baiviet['ngayDang'].'</li>
							';
							?>
                        </ul>
                    </div>
                    <div class="body m-3">    
						<?php 
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
			
						if(isset($_SESSION['idTaiKhoan'])){
							$sql = "select * from TuongTacBaiViet where idBaiViet = ".$baiviet['idBaiViet']." and idTaiKhoan = ".$_SESSION['idTaiKhoan'];
						$result = $conn->query($sql);
						$icon = "<i class='mr-1 ti-face-smile'></i>";
	
						if (mysqli_num_rows($result) > 0) {
							$icon = "<i class='mr-1 ti-face-sad'></i>";
						}
						}
						
						$sql = "select count(idTuongTac) as dem from tuongtacbaiviet where idBaiViet = ".$baiviet['idBaiViet'];
						
						$result = $conn->query($sql);
	
						$dem = null;
	
						if (mysqli_num_rows($result) > 0) {
							$dem = mysqli_fetch_assoc($result);
						}	
						
                        echo '
						<p>'.$baiviet['noiDung'].'</p><hr>
						
						';
						if(isset($_SESSION['idTaiKhoan'])){
							echo '<form method="post">
									<ul class="list-inline ml-2">
										
												<input type="hidden" name="likebv" value="'.$baiviet['idBaiViet'].'">
												<li><button type="submit" value="Like" class="btn btn-sm">'.$icon.$dem['dem'].'</button></li>
												
										
											</ul></form>';
						}
						?>
						
                    </div>

                </div>
				
				<?php
			
				
					foreach($binhluan as $bl){
						
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
			
						$sql = "select * from TuongTacBinhLuan where idBinhLuan = ".$bl['idBinhLuan'];
						$result = $conn->query($sql);
						
						$thich = "Like";
						$icon = "<i class='mr-1 ti-face-smile'></i>";
	
						if (mysqli_num_rows($result) > 0) {
							$thich = "Unlike";
							$icon = "<i class='mr-1 ti-face-sad'></i>";
						}
						
						$sql = "select count(idTuongTac) as dem from tuongtacbinhluan where idBinhLuan = ".$bl['idBinhLuan'];
						
						$result = $conn->query($sql);
	
						$dem = null;
	
						if (mysqli_num_rows($result) > 0) {
							$dem = mysqli_fetch_assoc($result);
						}	
						
						
						$dateString = $bl['ngayDang'];
						$date = new DateTime($dateString);
						$formattedDate = $date->format("d/m/Y");
						echo '<div class="card mt-3">
				<h5 class="title ml-3 mt-2 mb-2"></h5>
                    <div class="body">
                        <div class="comment-box">
                            <div class="single-comment-box">
                                <ul>
                                    <li>
                                        <div class="icon-box ml-2"><img alt="Bootstrap Image Preview" class="img-thumbnail m-2" width="20px" height="20px" 
										src="'.$bl['avatar'].'" />
							</div>
                                        <div class="text-box">
                                            <tr>
												<td><p class="mt-2">'.$bl['noiDung'].'</p></td>
											</tr>
                                        </div>
											<ul>
												<li class="ml-2">
													<i class="ti-user"></i><a class="text-dark ml-1" href="xemhoso.php?id='.$bl['idTaiKhoan'].'">'.$bl['tenHienThi'].'</a>
												</li>
												<li> <i class="ti-calendar ml-2 mr-1"></i>Ngày đăng: '.$formattedDate.'</li>
											</ul>
											<ul class="list-inline mt-2">';
										
												
												if((isset($_SESSION['idTaiKhoan']) && $_SESSION['idTaiKhoan'] == $bl['idTaiKhoan']) || (isset($_SESSION['idTaiKhoan']) && $_SESSION['capBac'] == 10)){
													echo '
														<li>
												<a href="suabinhluan.php?id='.$bl['idBinhLuan'].'"><i class="ml-1 ti-pencil-alt text-dark"></i></a>
												</li>

												<li>
												<button class="btn btn-link btn-sm delete-btnbl" data-toggle="modal" data-target="#deleteModal" data-binhluanid="' . $bl['idBinhLuan'] . '"><i class="ti-trash text-dark ml-2"></i></button>
												</li>
													';
												}
												
												if(isset($_SESSION['email']) && $_SESSION['email'] != null){
													echo '
												<li class="">
												<button class="btn btn-link btn-sm report-btnbl" data-toggle="modal" data-target="#reportModal" data-binhluanid="' . $bl['idBinhLuan'] . '"><i class="ti-alert text-dark mr-1"></i></button>
												</li>';
												}

										echo '
											</ul>
                                    </li>

									<li>';
									if(isset($_SESSION['email']) && $_SESSION['email'] != null){
									echo '
									<form method="post">
									<ul class="list-inline ml-2">
										
												<input type="hidden" name="like" value="'.$bl['idBinhLuan'].'">
												<li><button type="submit" value="Like" class="likeButton btn btn-sm">'.$icon.$dem['dem'].'</button></li>
												
										
											</ul></form>';
									echo '   <hr>';
									}
									echo '</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>';
					}
				?>
				
            </div>
        </div>
    </div>
</section>
<!-- day la binh luan cu -->


<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<link rel="icon" href="favicon.ico" type="image/x-icon">
<link rel="stylesheet" href="./Assets/image/themify-icons/themify-icons.css">
<!-- Favicon-->
<link href="./assets/template/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
<link href="./assets/template/assets/css/blog.css" rel="stylesheet">
<!-- Custom Css -->
<!-- <link href="./assets/template/assets/css/main.css" rel="stylesheet"> -->
<!-- choose a theme from css/themes instead of get all themes -->
<!-- <link href="./assets/css/themes/all-themes.css" rel="stylesheet" /> -->
</head>
<body class="theme-blue">
<!-- Page Loader -->


<!-- main content -->


<div class="container">
    <div class="container-fluid p-0 mt-2">
		<div class="row">
			
			<div class="col-xl-12">
			<form method="post">
				<input type="hidden" name="form" value="submitted">
				<div class="card mt-3">
                    <div class="body">
                        <div class="comment-form m-2">
                            <form action="#" id="commentform" class="ft-fm-2 mtt40 row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <textarea rows="4" class="form-control no-resize" id="noiDung" name="noiDung" required placeholder="Nhập nội dung bình luận"></textarea>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary text-light">Đăng bình luận</button>
                                </div>                                
                            </form>
                        </div>
                    </div>
                </div>
				</form>
				<br><br>
			</div>
		</div>
</div>
</div>



<!-- like/unlike bình luận-->



<!--tố cáo bài viết-->

<div class="modal fade" id="reportModalbv" tabindex="-1" role="dialog" aria-labelledby="reportModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form method="POST">
        <input type="hidden" name="reportbv" value="submitted">
        <div class="modal-header">
          <h5 class="modal-title" id="reportModalLabel">Tố cáo bài viết</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <label for="reportContent">Lý do tố cáo:</label>
          <textarea class="form-control" id="reportContent" required name="noiDung"></textarea>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
          <button type="submit" class="btn btn-primary">Gửi</button>
        </div>
      </form>
    </div>
  </div>
</div>


<!--tố cáo bình luận-->

<div class="modal fade" id="reportModal" tabindex="-1" role="dialog" aria-labelledby="reportModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="POST">
                <input type="hidden" name="reportbl" value="submitted">
                <div class="modal-header">
                    <h5 class="modal-title" id="reportModalLabel">Tố cáo bình luận</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <label for="reportContent">Lý do tố cáo:</label>
                    <textarea class="form-control" id="reportContent" required name="noiDung"></textarea>
                    <input type="hidden" id="binhLuanId" name="binhLuanId">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
                    <button type="submit" class="btn btn-primary">Gửi</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    var reportButtons = document.querySelectorAll('.report-btnbl');
    reportButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            var binhLuanId = this.getAttribute('data-binhluanid');
            var binhLuanIdInput = document.querySelector('#binhLuanId');
            binhLuanIdInput.value = binhLuanId;
        });
    });

    var reportForm = document.querySelector('#reportForm');
    reportForm.addEventListener('submit', function(e) {
        e.preventDefault();
        
        var binhLuanIdInput = document.querySelector('#binhLuanId');
        var reportContentInput = document.querySelector('#reportContent');
        var binhLuanId = binhLuanIdInput.value;
        var reportContent = reportContentInput.value;
        
        reportContentInput.value = '';
        $('#reportModal').modal('hide');
    });
</script>

<!--Xóa bình luận-->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="POST">
            <input type="hidden" id="binhLuanId" name="binhLuanId">
                <input type="hidden" name="deletebl" value="submitted">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Bạn có chắc muốn xóa bình luận</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
              
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                    <button type="submit" class="btn btn-primary">Có</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    var deleteButtons = document.querySelectorAll('.delete-btnbl');
deleteButtons.forEach(function(button) {
  button.addEventListener('click', function() {
    var binhLuanId = this.getAttribute('data-binhluanid');
    var binhLuanIdInput = document.querySelector('#deleteModal #binhLuanId');
    binhLuanIdInput.value = binhLuanId;
  });
});

var deleteForm = document.querySelector('#deleteModal form');
deleteForm.addEventListener('submit', function(e) {
  e.preventDefault();
  
  var binhLuanIdInput = document.querySelector('#deleteModal #binhLuanId');
  var binhLuanId = binhLuanIdInput.value;
  
  // Gửi form
  deleteForm.submit();
  
  
  binhLuanIdInput.value = '';
  $('#deleteModal').modal('hide');
});
</script>
<!--Xóa bài viết-->
<div class="modal fade" id="deleteModalbv" tabindex="-1" role="dialog" aria-labelledby="deleteModalbvLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="POST">
            <input type="hidden" id="binhLuanId" name="binhLuanId">
                <input type="hidden" name="deletebv" value="submitted">
				<input type="hidden" name="idBaiViet" value="<?php echo $_GET['id']?>">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Bạn có chắc muốn xóa bài viết</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
              
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                    <button type="submit" class="btn btn-primary">Có</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Jquery Core Js --> 
<script src="./assets/template/assets/bundles/libscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js ( jquery.v3.2.1, Bootstrap4 js) --> 
<script src="./assets/template/assets/bundles/vendorscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js --> 

<script src="./assets/template/assets/bundles/mainscripts.bundle.js"></script><!-- Custom Js -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</body>
</html>