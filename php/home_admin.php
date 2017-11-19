
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
				$query = mysqli_query($con,"SELECT  c.NamaMedia, a.NamaAlas, a.GambarAlas, d.NamaModel, b.Panjang, b.Lebar FROM alas a join designtrans b on a.id = b.idAlas join media_tanams c on c.id = b.idMediaTanam join nama_models d on d.id = b.idModel order by idDesign desc limit 1 ") or die(mysqli_error());
				if(mysqli_num_rows($query) == 0){
					echo '<tr><td colspan="7">Tidak ada data!</td></tr>';
				}
				else{
					while($data = mysqli_fetch_assoc($query)){
						echo '<tr>';
						
						echo '<td>'.$data['NamaMedia'].'</td>';
						echo '<td>'.$data['NamaAlas'].'</td>';
						echo '<td><img src="http://localhost/hidroponik/gambar/'.$data['GambarAlas'].'.jpg"></td>';
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
		<div>
		<table>
			<thead>
				<tr>
				
					
					<th>Nama Bahan</th>
					<th>Ukuran</th>
					<th>Harga</th>
					
					<th>Jumlah</th>
					<th>Harga Total</th>
					<th>Gambar</th>
					<th>Gambar 3D</th>
					
				</tr>
			</thead>
			<tbody>
				<?php
				include('koneksi.php');
				$query = mysqli_query($con,"SELECT b.idDesign, c.NamaMedia, a.NamaAlas, a.GambarAlas, d.NamaModel, b.Panjang, b.Lebar FROM alas a join designtrans b on a.id = b.idAlas join media_tanams c on c.id = b.idMediaTanam join nama_models d on d.id = b.idModel order by idDesign desc limit 1 ") or die(mysqli_error());
				$design = mysqli_fetch_assoc($query);
						
						$panjang=$design['Panjang'];
						$lebar=$design['Lebar'];
						
						
					
				
				
				if($panjang%4!=0){
					$tambahanPipa=1;
				}
				$tambahanJumlahMedia=0;
				if($panjang%4==3){
					$tambahanJumlahMedia=15;
					$cek=2.5;
				}
				if($panjang%4==2){
					$tambahanJumlahMedia=10;
					$cek=1.5;

				}
				if($panjang%4==1){
					$tambahanJumlahMedia=5;
					$cek=0.5;
				}
				if($panjang%4==0){
					$tambahanJumlahMedia=5;
					$cek=3.5;
				}
				$banyakAlas1=$lebar*5*((int)($panjang/4));
				$banyakAlas2=$lebar*5*$tambahanPipa;

				$banyakAlas=$banyakAlas1+$banyakAlas2;
				
				$banyakKaki=$banyakAlas*3;
				$banyakOutput=$banyakAlas;
				$ukuranOutput=$lebar-0.5;
				$banyakInput=$banyakAlas;
				$banyakOutputBesar=(int)$panjang/4;
				$banyakInputBesar=$banyakOutputBesar;

				$jumlahMediaTanam=($lebar*5*((int)($lebar/4))*20)+($lebar*5*$tambahanJumlahMedia);
				$jumlahNetpot=$jumlahMediaTanam;


				$query = mysqli_query($con,"SELECT * FROM bahans") or die(mysqli_error());
				$NamaBahan=[];
				while($data = mysqli_fetch_assoc($query)){
						$namaBahan[]=$data['NamaBahan'];
						$harga[]=$data['HargaBahan'];
					}
				$query = mysqli_query($con,"SELECT * FROM designtrans order by idDesign desc limit 1 ") or die(mysqli_error());
				$designTrans=[];
				while($data = mysqli_fetch_assoc($query)){
						$designTrans[]=$data['idMediaTanam'];
						$designTrans[]=$data['idAlas'];
						$designTrans[]=$data['idModel'];
					}
				
				
				
				//alas
				if($designTrans[1]==1){
					$namaAlas=$namaBahan[0];
					$hargaAlas=$harga[0];
				}
				if($designTrans[1]==2){
					$namaAlas=$namaBahan[1];
					$hargaAlas=$harga[1];
				}
				if($designTrans[1]==3){
					$namaAlas=$namaBahan[2];
					$hargaAlas=$harga[2];
				}
				if($panjang>4){
				echo '<tr>';
				echo '<td>'.$namaAlas.'</td>';
				echo '<td>3,5 Meter</td>';
				echo '<td>'.$hargaAlas*3.5.'</td>';
				echo '<td>'.$banyakAlas1.'</td>';
				echo '<td>'.$banyakAlas1*$hargaAlas*3.5.'</td>';
				echo '</tr>';
				}
				echo '<tr>';
				echo '<td>'.$namaAlas.'</td>';
				echo '<td>'.$cek.' Meter</td>';
				echo '<td>'.$hargaAlas*$cek.'</td>';
				echo '<td>'.$banyakAlas2.'</td>';
				echo '<td>'.$banyakAlas2*$hargaAlas*$cek.'</td>';
				echo '</tr>';
				//cagak
				if($designTrans[2]==1){
				echo '<tr>';
				echo '<td>Cagak</td>';
				echo '<td>0,5 Meter</td>';
				echo '<td>'.$harga[$cek].'</td>';
				echo '<td>'.$banyakKaki.'</td>';
				echo '<td>'.$banyakKaki*$harga[$cek].'</td>';
				echo '</tr>';
				}
				if($designTrans[2]==2){
					for($i=0;$i<5;$i++){
					echo '<tr>';
					echo '<td>Cagak</td>';
					echo '<td>'.($i+1)*0.1.' Meter</td>';
					echo '<td>'.$harga[$cek].'</td>';
					echo '<td>'.$banyakKaki.'</td>';
					echo '<td>'.$banyakKaki*$harga[$cek].'</td>';
					echo '</tr>';
				}
				}
				//output
				echo '<tr>';
				echo '<td>'.$NamaBahan[0].'</td>';
				echo '<td>'.$ukuranOutput.' Meter</td>';
				echo '<td>'.$ukuranOutput.'</td>';
				echo '<td>'.$banyakOutput.'</td>';
				echo '<td>'.$banyakOutput*$ukuranOutput.'</td>';
				echo '</tr>';
				
				
				
				
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