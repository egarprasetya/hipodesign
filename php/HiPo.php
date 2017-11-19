<?php
header('Access-Control-Allow-Origin: *');
$servername="localhost";
$username="root";
$password ="";
$dbName="HiPo";

//membuat koneksi
$conn= new mysqli($servername,$username,$password,$dbName);
//cek koneksi
if(!$conn){
	die("Connection Field.".mysqli_connect_error());
}
//else echo("Connection Success");

$sql="select *from media_tanams";
$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result)>0){
	//menampilkan data tiap row
	while($row=mysqli_fetch_assoc($result)){
		echo $row['NamaMedia'].";".$row['Kelebihan'].";".$row['Kekurangan'].";";
		
}
}
?>