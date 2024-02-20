<?php
	$id = $_GET['id'];
	
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
	
	$sql = "SELECT TaiKhoan.*, COUNT(BaiViet.idTaiKhoan) AS soLuongBaiViet 
         FROM TaiKhoan 
         LEFT JOIN BaiViet ON TaiKhoan.idTaiKhoan = BaiViet.idTaiKhoan 
         WHERE TaiKhoan.idTaiKhoan = $id 
         GROUP BY TaiKhoan.idTaiKhoan";
	$result = $conn->query($sql);
	
	$baiviet = null;
	
	if (mysqli_num_rows($result) > 0) {
		$baiviet = mysqli_fetch_assoc($result);
	}
	
	$sql = "SELECT TaiKhoan.*, COUNT(BinhLuan.idTaiKhoan) AS soLuongBinhLuan
         FROM TaiKhoan 
         LEFT JOIN BinhLuan ON TaiKhoan.idTaiKhoan = BinhLuan.idTaiKhoan 
         WHERE TaiKhoan.idTaiKhoan = $id 
         GROUP BY TaiKhoan.idTaiKhoan";
	$result = $conn->query($sql);
	
	$binhLuan = null;
	
	if (mysqli_num_rows($result) > 0) {
		$binhLuan = mysqli_fetch_assoc($result);
	}
	
?>

<section class="vh-100" style="background-color: #eee;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-12 col-xl-4">

        <div class="card" style="border-radius: 15px;">
          <div class="card-body text-center">
            <div class="mt-3 mb-4">
              <img src="<?php 
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
			?>"
                class="rounded-circle img-fluid" style="width: 100px;" />
            </div>
            <h4 class="mb-2"><?php echo $baiviet['tenHienThi']?></h4>
            <p class="mb-4"><?php echo "Ngày sinh: ".$baiviet['ngaySinh']."<br>" ?><?php 
				if($baiviet['capBac'] == 10){
					echo 'Administrator';
				}
				else echo 'Member';
			?></p>
            <div class="mb-4 pb-2">
              <!--<button type="button" class="btn btn-primary btn-floating">
                Report
              </button>
            </div>
            <button type="button" class="btn btn-primary btn-rounded btn-lg">
              Message now
            </button>-->
            <div class="d-flex justify-content-between text-center mt-5 mb-2">
              <div>
                <p class="mb-2 h5"><?php echo $baiviet['soLuongBaiViet']?></p>
                <p class="text-muted mb-0">Tổng số bài viết</p>
              </div>
              <div class="px-3">
                <p class="mb-2 h5"><?php echo $binhLuan['soLuongBinhLuan']?></p>
                <p class="text-muted mb-0">Tổng số bình luận</p>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</section>