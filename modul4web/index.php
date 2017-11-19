<?php
// Memulai session
session_start();
if(!empty($_SESSION['username'])){
echo " <script> alert('selamat datang ".$_SESSION ['username']." ')</script>;";
}
?>
<html>
<head>
	<title>Home-User</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	</head>

<body>
	<div class="wrapper">
		<h1>Selamat Datang di Website Jual Beli</h1>

		<div class="main-home-user">
			<a href="login.php" class="button-jual">Login</a>
			<a href="" class="button-jual">Daftar</a>
		</div>

		<!--Kontent-->

		<!--Kategori barang  Handphone-->
		<div class="kategori">
			<hr>
			<h3>Kategori HP</h3>
			<div class="barang">
				<a href=""><img src="gambar/samsung.jpg"></a>
				<label>Harga: Rp 1.200.000</label>
			</div>
			<div class="barang">
				<a href=""><img src="gambar/xiaomi.jpg"></a>
				<label>Harga: Rp 1.700.000</label>
			</div>
			<div class="barang">
				<a href=""><img src="gambar/meizu.jpg"></a>
				<label>Harga: Rp 1.950.000</label>
			</div>
			<div class="barang">
				<a href=""><img src="gambar/bb.jpg"></a>
				<label>Harga: Rp 1.800.000</label>
			</div>
		</div>


	</div>
</body>
</html>
