<?php
	if (isset($_POST['form']) && $_POST['form'] == 'submitted') {
		// Form 1 was submitted
		require_once('controllers/BinhLuanController.php');
		$binhLuanController = new BinhLuanController();
		$binhLuanController->XoaBinhLuan(); 
	}
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "4rum";
	
?>

<div class="container">
    <div class="container-fluid p-0">
		<div class="row">
			
			<div class="col-xl-12">
			<form method="post">
				<input type="hidden" name="form" value="submitted">
			
				<button  type="submit" class="btn btn-primary mt-2">Xác nhận</button> 
				
				</form>
				<br><br>
				
				
			</div>


		</div>

	</div>
</div>
