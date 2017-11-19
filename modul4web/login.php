<?php

include ('ceklogin.php');

?>

<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
	<div class="wrapper">
		<h1>Halaman Login Website Jual Beli</h1>
		<hr>

		<center>
			<label>Belum terdaftar? Silahkan klik <a href="">Daftar</a> untuk mendaftar!</label>
		</center>

		<div class="form-login">
			<h2>Silahkan Login</h2>
			<form action="" method="POST">
				<div class="main-form">
					<div class="input-form">
						<label>Username :</label>
						<input type="text" name="username" >
					</div>
					<div class="input-form">
						<label>Password :</label>
						<input type="password" name="password" >
					</div>
					<button type="submit" name="submit">Login</button>
				</div>
			</form>
		</div>
	</div>

</body>
</html>
