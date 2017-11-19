
<!DOCTYPE html>
<html>
<head>
	<title>Detail Harga</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
	<div class="wrapper">
		

		<table>
			<thead>
				<tr>
				
					<th>ID</th>
					<th>Media Tanam</th>
					<th>Alas</th>
					<th>Model</th>
					<th>Panjang</th>
					<th>Lebar</th>
					
				</tr>
			</thead>
			<tbody>
				<?php
				include('koneksi.php');
				$query = mysqli_query($con,"SELECT b.idDesign, c.NamaMedia, a.NamaAlas, d.NamaModel, b.Panjang, b.Lebar FROM alas a join designtrans b on a.id = b.idAlas join media_tanams c on c.id = b.idMediaTanam join nama_models d on d.id = b.idModel order by idDesign desc limit 1 ") or die(mysqli_error());
				if(mysqli_num_rows($query) == 0){
					echo '<tr><td colspan="7">Tidak ada data!</td></tr>';
				}
				else{
					while($data = mysqli_fetch_assoc($query)){
						echo '<tr>';
						echo '<td>'.$data['idDesign'].'</td>';
						echo '<td>'.$data['NamaMedia'].'</td>';
						echo '<td>'.$data['NamaAlas'].'</td>';
						echo '<td>'.$data['NamaModel'].'</td>';
						echo '<td>'.$data['Panjang'].'</td>';
						echo '<td>'.$data['Lebar'].'</td>';
						
						echo '</tr>';
					}
				}
				
				
				
				?>
			</tbody>
		</table>
		</div>
		<div class="wrapper">
		<table>
			<thead>
				<tr>
				
					<th>ID</th>
					<th>Nama Bahan</th>
					<th>Harga Bahan</th>
					
				</tr>
			</thead>
			<tbody>
				<?php
				include('koneksi.php');
				$query = mysqli_query($con,"SELECT * FROM bahans") or die(mysqli_error());


				$pipa=[];



				if(mysqli_num_rows($query) == 0){
					echo '<tr><td colspan="7">Tidak ada data!</td></tr>';
				}
				else{
					while($data = mysqli_fetch_assoc($query)){
						echo '<tr>';
						echo '<td>'.$data['id'].'</td>';
						echo '<td>'.$data['NamaBahan'].'</td>';
						echo '<td>'.$data['HargaBahan'].'</td>';
						$pipa[]=$data['HargaBahan'];
						echo '</tr>';
						

					}
				}
				
				
				$query = mysqli_query($con,"SELECT b.idMediaTanam, a.NamaMedia, a.Harga FROM media_tanams a join designtrans b on a.id = b.idMediaTanam order by idDesign desc limit 1") or die(mysqli_error());
				if(mysqli_num_rows($query) == 0){
					echo '<tr><td colspan="7">Tidak ada data!</td></tr>';
				}
				else{
					while($data = mysqli_fetch_assoc($query)){
						echo '<tr>';
						echo '<td>'.$data['idMediaTanam'].'</td>';
						echo '<td>'.$data['NamaMedia'].'</td>';
						echo '<td>'.$data['Harga'].'</td>';
						
						echo '</tr>';
					}
				}

				
				
				$query = mysqli_query($con,"SELECT b.idAlas, a.NamaAlas, a.Harga FROM alas a join designtrans b on a.id = b.idAlas order by idDesign desc limit 1") or die(mysqli_error());
				if(mysqli_num_rows($query) == 0){
					echo '<tr><td colspan="7">Tidak ada data!</td></tr>';
				}
				else{
					while($data = mysqli_fetch_assoc($query)){
						echo '<tr>';
						echo '<td>'.$data['idAlas'].'</td>';
						echo '<td>'.$data['NamaAlas'].'</td>';
						echo '<td>'.$data['Harga'].'</td>';
						
						echo '</tr>';
					}
				}
				
				
				
				?>
			</tbody>
		</table>
	</div>
</body>
</html>
