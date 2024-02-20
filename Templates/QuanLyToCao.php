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
	
	$sql = "SELECT *, ToCaoBaiViet.noiDung as noiDungBaiViet from ToCaoBaiViet 
	join BaiViet on ToCaoBaiViet.idBaiViet = BaiViet.idBaiViet
	JOIN TaiKhoan ON ToCaoBaiViet.idTaiKhoan = TaiKhoan.idTaiKhoan
	";
	$result = $conn->query($sql);
	
	$tocao = array();
	
	if (mysqli_num_rows($result) > 0) {
		while($row = mysqli_fetch_assoc($result)) {
			$tocao[] = $row;
		}
	}
	
	
	
	$sql = "SELECT *, BinhLuan.idTaiKhoan as nguoiBiToCao, ToCaoBinhLuan.noiDung as noiDungBinhLuan from ToCaoBinhLuan 
	join BinhLuan on ToCaoBinhLuan.idBinhLuan = BinhLuan.idBinhLuan
	JOIN TaiKhoan ON ToCaoBinhLuan.idTaiKhoan = TaiKhoan.idTaiKhoan
	";
	$result = $conn->query($sql);
	
	$tocao2 = array();
	
	if (mysqli_num_rows($result) > 0) {
		while($row = mysqli_fetch_assoc($result)) {
			$tocao2[] = $row;
		}
	}

?>
<div class="container my-5 ">
<h2 align="center" class="mb-3">Danh sách bài viết bị tố cáo</h2>
<table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Tiêu đề bài viết</th>
	  <th scope="col">Nội dung tố cáo</th>
	  <th scope="col">Người tố cáo</th>
	  
	  
    </tr>
  </thead>
  <tbody>
	<?php
		foreach($tocao as $tc){
			echo '<tr>
				<th>'.$tc['idToCao'].'</th>
				<td><a href="baiviet.php?id='.$tc['idBaiViet'].'">'.$tc['tieuDe'].'</a></td>
				<td>'.$tc['noiDungBaiViet'].'</td>
				<td><a href="xemhoso.php?id='.$tc['idTaiKhoan'].'">'.$tc['tenHienThi'].'</a></td>
				</tr>';
		}
	?>
  </tbody>
</table>
</div>

<div class="container my-5">
<h2 align="center" class="mb-3">Danh sách bình luận bị tố cáo</h2>
<table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Bình luận ở bài viết</th>
	  <th scope="col">Nội dung bình luận</th>
	  <th scope="col">Nội dung tố cáo</th>
	  <th scope="col">Người tố cáo</th>
	  <th scope="col">Người bị tố cáo</th>
	  
	  
    </tr>
  </thead>
  <tbody>
	<?php
		foreach($tocao2 as $tc){
			$noiDung = $tc['noiDung'];
			if (mb_strlen($noiDung, 'UTF-8') > 50) {
				$noiDung = mb_substr($noiDung, 0, 50, 'UTF-8') . ' ...';
			}
			
			$sqll = "select * from BinhLuan join TaiKhoan on BinhLuan.idTaiKhoan = TaiKhoan.idTaiKhoan where BinhLuan.idTaiKhoan = ".$tc['nguoiBiToCao'];
			
			$resultt = $conn->query($sqll);
			
			$reported = null;
			if (mysqli_num_rows($resultt) > 0) {
				$reported = mysqli_fetch_assoc($resultt);
			}	
			
			$sqll = "select * from BaiViet where idBaiViet = ".$tc['idBaiViet'];
			
			$resultt = $conn->query($sqll);
			
			$bv = null;
			
			if(mysqli_num_rows($resultt)>0){
				$bv = mysqli_fetch_assoc($resultt);
			}
			
			
			echo '<tr>
				<th>'.$tc['idToCao'].'</th>
				<td class="w-20"><a href="baiviet.php?id='.$tc['idBaiViet'].'">'.$bv['tieuDe'].'</a></td>
				<td class="w-20">'.$noiDung.'</td>
				<td class="w-20">'.$tc['noiDungBinhLuan'].'</td>
				<td class="w-20"><a href="xemhoso.php?id='.$tc['idTaiKhoan'].'">'.$tc['tenHienThi'].'</a></td>
				<td class="w-20"><a href="xemhoso.php?id='.$reported['idTaiKhoan'].'">'.$reported['tenHienThi'].'</a></td>
				</tr>';
		}
	?>
  </tbody>
</table>
</div>