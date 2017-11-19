<?php
if(isset($_POST['tambah'])){
	include('koneksi.php');
	$namabarang = $_POST['namabarang'];
	$jenisbarang = $_POST['jenisbarang'];
	$harga = $_POST['harga'];
	$deskripsi = $_POST['deskripsi'];
	$fileName = $_FILES['gambar']['name'];
	// echo $namabarang;
	move_uploaded_file($_FILES['gambar']['tmp_name'], "gambar/".$_FILES['gambar']['name']);
	$input = mysqli_query($con,"INSERT INTO barang VALUES(NULL, '$namabarang', '$jenisbarang', '$harga', '$deskripsi',
		'$fileName')") or die(mysqli_error());
	if($input){
		header('location:home_admin.php');
	}else{
		echo 'Gagal menambahkan data! ';
	}
}
?>
</html>
<!DOCTYPE html>
<html>
<head>
	<title>Admin-Home</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
	<div class="wrapper">
		<h1>Tambah Barang</h1>
		<div class="main-home">
			<a href="home_admin.html" class="button-jual">CRUD Barang Jual</a>
			<a href="tabel_member.html" class="button-jual">Tabel Member</a>
			<a href="#" class="button-jual">Validasi Pemberlian</a>
			<a href="#" class="button-delete">Logout</a>
		</div>

		<div class="form-cari">
			<input type="text" placeholder="Masukkan kata kunci pencarian...">
			<button type="submit" class="button-delete">Cari</button>
			
		</div>
		<form action="" method="post" enctype="multipart/form-data">
			<div class="crud-barang">
				<div class="main-form">
					<div class="input-form">
						<label>Nama Barang</label>
						<input type="text" name="namabarang">					
					</div>

					<div class="input-form">
						<label>Jenis Barang</label>
						<select name="jenisbarang">
							<option value="hp">HP</option>
							<option value="laptop">Laptop</option>
							<option value="hardware">Hardware</option>
							<option value="software">Software</option>
						</select>					
					</div>
					<div class="input-form">
						<label>Harga</label>
						<input type="number" name="harga" placeholder="Rp">
					</div>
					<div class="input-form">
						<label>Deskripsi</label>
						<br>
						<textarea style="width: 100%; height: 100px;" name="deskripsi"></textarea>
					</div>
					<div class="input-form">
						<label>Foto</label>
						<input type="file"  name="gambar">
					</div>

					<button type="submit" name="tambah" id="tambah" class="button-ijo">Simpan</button>
				</div>

			</div>
		</form>
		
	</div>
</body>
</html>
