<?php
//variabel buat koneksi
$servername="localhost";
$server_username="root";
$server_password ="";
$dbName="hidroponik";

//variabel buat input
$idModel=$_POST["modelPost"];

//membuat koneksi
$conn= new mysqli($servername,$server_username,$server_password,$dbName);
//cek koneksi
if(!$conn){
	die("Connection Field.".mysqli_connect_error());
}
//else echo("Connection Success");


//sql untuk insert users
$sql="UPDATE `designtrans` SET `idModel` = '".$idModel."' WHERE `designtrans`.`idModel` = '0';";
$result = mysqli_query($conn,$sql);
//untuk pengecekan dalam penginputan
if(!result) echo "there was an error";
else echo "Everything ok";


?>