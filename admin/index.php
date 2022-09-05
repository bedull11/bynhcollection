<?php
session_start();
?>

<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>ByNH Collection</title>
	<!-- Custom fonts for this template-->
	<!--Font Awesome-->
	<!-- <link rel="stylesheet" href="assets/css/all.css"> -->
	<link href="assets/css/all.min.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css2?family=Heebo&display=swap" rel="stylesheet">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css">

	<!--CSS-->
	<link rel="stylesheet" href="../assets/css/auth.css">
</head>

<body style="background-color: white;">
	<!-- Login -->
	<div class="page-content page-auth mt-5 p-5">
		<div class="section-store-auth" data-aos="fade-up">
			<div class="container">
				<div class="row">
					<div class="col">
						<?php
						// fungsi untuk menampilkan pesan
						// jika alert = "" (kosong)
						// tampilkan pesan "" (kosong)
						if (empty($_GET['alert'])) {
							echo "";
						}
						// jika alert = 1
						elseif ($_GET['alert'] == 1) {
							echo "<div class='alert alert-success' role='alert'>
                    Username atau Password Salah!
                  </div>";
						}
						?>
					</div>
				</div>
				<div class="row align-items-center row-login" style="font-family: Heebo;">
					<div class="col-lg-6 text-center">
						<img src="assets/img/login.svg" alt="" class="w-50 mb-4 mb-lg-none" />
					</div>
					<div class="col-lg-5" style="color: black;">
						<h2 style="color: black;">Selamat Datang di Admin Page</h2>
						<form class="mt-3" method="POST" action="login-check.php">
							<div class="form-group">
								<label>Username</label>
								<input type="text" class="form-control" name="username" />
							</div>
							<div class="form-group">
								<label>Password</label>
								<input type="password" class="form-control" name="password" />
							</div>
							<button class="btn btn-login btn-success text-white btn-block mt-4" type="submit" name="login">
								Login
							</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>


	<!-- <script src="../assets/js/jquery-3.6.0.min.js"></script> -->
	<script src="../assets/js/popper.min.js"></script>
	<script src="../assets/js/bootstrap.min.js"></script>
	<script src="../assets/js/all.min.js"></script>
</body>

</html>