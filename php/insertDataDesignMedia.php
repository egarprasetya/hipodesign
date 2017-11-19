<?php
//variabel buat koneksi
$servername="localhost";
$server_username="root";
$server_password ="";
$dbName="hidroponik";

//variabel buat input
$idMediaTanam =$_POST["mediaTanamPost"];

//membuat koneksi
$conn= new mysqli($servername,$server_username,$server_password,$dbName);
//cek koneksi
if(!$conn){
	die("Connection Field.".mysqli_connect_error());
}
//else echo("Connection Success");


//sql untuk insert users
$sql="INSERT INTO `designtrans` (`idDesign`, `idMediaTanam`, `idAlas`, `idModel`, `Panjang`, `Lebar`) VALUES (NULL, '".$idMediaTanam."', '', '', '', '');";
$result = mysqli_query($conn,$sql);
//untuk pengecekan dalam penginputan
if(!result) echo "there was an error";
else echo "Everything ok";


?>