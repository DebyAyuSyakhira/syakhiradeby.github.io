<?php
	include 'config.php';

	session_start();

	error_reporting(0);

	if (isset($_SESSION['username'])) {
		header("Location: login_user.php");
	}

	if (isset($_POST['submit'])) {
		$email = $_POST['email'];
		$password = md5($_POST['password']);
		$sql = "SELECT * FROM user WHERE email='$email' AND password='$password'";
		$result = mysqli_query($conn, $sql);
		if ($result->num_rows > 0) {
			$row = mysqli_fetch_assoc($result);
			$_SESSION['username'] = $row['username'];
			header("Location: halaman_user.php");
		} else {
			echo "<script>alert('Email Atau Password anda Salah.')</script>";
		}
	}
?> 

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css">
	<title>FORM LOGIN TOKO BUAH DHARMASRAYA</title>
</head>
<body>
	<div class="formlogin">
		<form action="" method="POST" class="login-email">
			<p class="login-text"style="font-size: 2rem; font-weight: 800; text-align: center;">Login</p>
			<div class="input-group">
				<input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
			</div>
			<div class="input-group">
				<button name="submit" class="btn">Login</button>
			</div>
			<p class="login-register-text">Don't have an account? <a href="register.php">Register Here</a>.</p>
		</form>
	</div>
	<footer>
	<p>Terimakasih Telah Mengunjungi Toko Kami</p>
	<p>Jangan lupa untuk Berbelanja lagi di Toko Dharmasraya
	<br>Contact US</p>
	<div class="social-icons">
		<a href="#"><i class="fab fa-whatsapp"></i></a>
		<a href="#"><i class="fab fa-instagram"></i></a>
		<a href="#"><i class="fab fa-twitter"></i></a>
		<a href="#"><i class="fab fa-facebook-f"></i></a>
		<a href="#"><i class="fab fa-youtube"></i></a>
	</div>
	<img alt="kaki-logo" class="kaki-logo" src="img/logo.png"> 
</footer>
</body>
</html>
