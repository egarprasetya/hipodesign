<?php
session_start();
if (!$_SESSION['loggedin']) {
	header("Location: index.php");
}
if ($_SESSION['level'] == 2) {
	header("Location: index.php");
}
error_reporting(0);
if(isset($_GET['logout'])){
	session_start();
	session_destroy();
	header("Location: index.php");
}
if (isset($_GET['id'])) {
	include('koneksi.php');
	$delete = mysqli_query($con,"DELETE FROM barang WHERE ID=" . $_GET['id']) or die(mysqli_error());
	if ($delete) {
		echo "<script>alert('Data berhasil dihapus');</script>";
		echo "<script>window.location = 'home_admin.php';</script>";
	} else {
		echo "<script>alert('Data gagal dihapus');</script>";
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin-Home</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
	<div class="wrapper">
		<h1>CRUD Barang Jual</h1>
		<div class="main-home">
			<a href="home_admin.html" class="button-jual">CRUD Barang Jual</a>
			<a href="tabel_member.html" class="button-jual">Tabel Member</a>
			<a href="#" class="button-jual">Validasi Pemberlian</a>
			<a href="?logout=true" class="button-delete">Logout</a>
		</div>

		<div class="form-cari">
			<input type="text" placeholder="Masukkan kata kunci pencarian...">
			<button type="submit" class="button-delete">Cari</button>
			
		</div>

		<a href="form_crud.html" class="button-jual">+Tambah Barang</a>

		<table>
			<thead>
				<tr>
					<th>ID</th>
					<th>Nama Barang</th>
					<th>Jenis Barang</th>
					<th>Harga</th>
					<th>Deskripsi</th>
					<th>Foto</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
				include('koneksi.php');
				$query = mysqli_query($con,"SELECT * FROM barang") or die(mysqli_error());
				if(mysqli_num_rows($query) == 0){
					echo '<tr><td colspan="7">Tidak ada data!</td></tr>';
				}
				else{
					while($data = mysqli_fetch_assoc($query)){
						echo '<tr>';
						echo '<td>'.$data['ID'].'</td>';
						echo '<td>'.$data['NamaBarang'].'</td>';
						echo '<td>'.$data['JenisBarang'].'</td>';
						echo '<td>'.$data['Harga'].'</td>';
						echo '<td>'.$data['Deskripsi'].'</td>';
						echo '<td><img src="gambar/'.$data['Foto'].'"></td>
						<td> <a href="form-update.php?id='.$data['ID'].'" class="button-jual">Edit</a>
						<a href="home_admin.php?id='.$data['ID'].'" class="button-delete">Delete</a>
						</td>';
						echo '</tr>';
					}
				}
				?>
			</tbody>
		</table>
	</div>
</body>
</html>
