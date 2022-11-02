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
		<form action="ceklogin_admin.php" method="POST" class="login">
			<p class="login-text" style="font-size: 2rem; font-weight: 800;">Form Login</p>
			<div class="input-data">
				<input type="text" placeholder="Username" name="username" required>
			</div><br>
			<div class="input-data">
				<input type="password" placeholder="Password" name="password" required>
			</div><br>
			<div class="input-data">
				<button name="submit" class="btn">Login</button>
			</div>
		</form>
	</div>
</body>
</html>