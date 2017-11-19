<?php
if (isset($_GET['id'])) {
	include('koneksi.php');
	$query = mysqli_query($con,"SELECT * FROM barang where ID =".$_GET['id']) or die(mysqli_error());
	if(mysqli_num_rows($query) > 0){
		$data = mysqli_fetch_assoc($query);
		unlink("gambar/".$data['Foto']);
	}
}
if(isset($_POST['update'])){
	include('koneksi.php');
	$namabarang = $_POST['namabarang'];
	$jenisbarang = $_POST['jenisbarang'];
	$harga = $_POST['harga'];
	$deskripsi = $_POST['deskripsi'];
	$fileName = $_FILES['gambar']['name'];
	move_uploaded_file($_FILES['gambar']['tmp_name'], "gambar/".$_FILES['gambar']['name']);
	$sql = "Update barang set NamaBarang='$namabarang', JenisBarang='$jenisbarang',Harga='$harga', Deskripsi='$deskripsi', Foto='$fileName' where ID='$_GET[id]' ";
	echo $sql;
	echo $_GET[id];
	$input = mysqli_query($con,$sql) or die(mysqli_error());
	if($input){
		header('location:home_admin.php');
	}else{
		echo 'Gagal update data! ';
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
						<input type="text" name="namabarang" value="<?php echo $data['NamaBarang'] ?>">					
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
						<input type="number" name="harga" placeholder="Rp" value="<?php echo $data['Harga'] ?>">
					</div>
					<div class="input-form">
						<label>Deskripsi</label>
						<br>
						<textarea style="width: 100%; height: 100px;" name="deskripsi" ><?php echo $data['Deskripsi'] ?></textarea>
					</div>
					<div class="input-form">
						<label>Foto</label>
						<input type="file"  name="gambar" />
					</div>

					<button type="submit" name="update" id="update" class="button-ijo">Simpan</button>
				</div>

			</div>
		</form>
		
	</div>
</body>
</html>
