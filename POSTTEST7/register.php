<?php

include 'config.php';

error_reporting(0);

session_start();

if (isset($_SESSION['username'])) {
    header("Location: login_user.php");
}

if (isset($_POST['submit'])) {
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	$cpassword = md5($_POST['cpassword']);

	if ($password == $cpassword) {
		$sql = "SELECT * FROM user WHERE email='$email'";
		$result = mysqli_query($conn, $sql);
		if (!$result->num_rows > 0) {
			$sql = "INSERT INTO user (username, email, password)
					VALUES ('$username', '$email', '$password')";
			$result = mysqli_query($conn, $sql);
			if ($result) {
				echo "<script>alert('Wow! User Registration Completed.')</script>";
				$username = "";
				$email = "";
				$_POST['password'] = "";
				$_POST['cpassword'] = "";
			} else {
				echo "<script>alert('Terjadi kesalaha!.')</script>";
			}
		} else {
			echo "<script>alert('Email telah tersedia.')</script>";
		}

	} else {
		echo "<script>alert('kata sandi tidak cocok.')</script>";
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>FORM REGISTRASI </title>
</head>
<body>
	<div class="formlogin">
		<form action="" method="POST" class="login-email">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Registrasi</p>
			<div class="input-group">
				<input type="text" placeholder="Username" name="username" value="<?php echo $username; ?>" required>
			</div>
			<div class="input-group">
				<input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
            </div>
            <div class="input-group">
				<input type="password" placeholder="Confirm Password" name="cpassword" value="<?php echo $_POST['cpassword']; ?>" required>
			</div>
			<div class="input-group">
				<button name="submit" class="btn">Register</button>
			</div>
			<p class="login-register-text">Have an account? <a href="login_user.php">Login Here</a>.</p>
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
