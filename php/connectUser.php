<?php
//variabel buat koneksi
$servername="localhost";
$server_username="root";
$server_password ="";
$dbName="HiPo";

//variabel buat input
$idMediaTanam =$_POST["mediaTanamPost"];
$idAlas=$_POST["alasPost"];
$idModel=$_POST["modelPost"];
$panjang=$_POST["panjangPost"];
$lebar=$_POST["lebarPost"];


//membuat koneksi
$conn= new mysqli($servername,$server_username,$server_password,$dbName);
//cek koneksi
if(!$conn){
	die("Connection Field.".mysqli_connect_error());
}
//else echo("Connection Success");


//sql untuk insert users
$sql="INSERT INTO `design` (`idDesign`, `idMediaTanam`, `idAlas`, `idModel`, `panjang`, `lebar`) VALUES (NULL, '".$idMediaTanam."', '".$idAlas."', '".$idModel."', '".$panjang."', '".$lebar."');";
$result = mysqli_query($conn,$sql);
//untuk pengecekan dalam penginputan
if(!result) echo "there was an error";
else echo "Everything ok";


?>