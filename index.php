<!DOCTYPE html>
<html>
<head>
	<title>UKK KASIR</title>
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
	<div class="container">
		<div class="content">
			<div class="card mt-5">
				<div class="row">
					<div class="col-6">
						<div class="card-body">
							<p class="text-center mt-5">Silahkan Masukan Username dan Password</p>
							<?php 
							if(isset($_GET['pesan'])){
								if($_GET['pesan']=="gagal"){
									echo "<div class='alert'>Username dan Password tidak sesuai !</div>";
								}
							}
							?>
							<form method="post" action="cek_login.php">
								<div class="form-group">
									<label>Username</label>
									<input type="text" class="form-control" name="username">
								</div>
								<div class="form-group">
									<label>Password</label>
									<input type="password" class="form-control" name="password">
								</div>
								<div class="form-group mt-3">
									<button class="btn btn-primary form-control" type="submit">Login</button>
								</div>
							</form>
						</div>
					</div>
					<div class="col-6">
						<div class="card-body">
							<img src="assets/login.png" width="500">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>