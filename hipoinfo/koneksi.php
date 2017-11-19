<?php  
$host = "localhost";
$username = 'root';
$password = '';
$db = 'hidroponik';


$con = mysqli_connect($host, $username, $password, $db);
// if ($con) {
// 	echo("KOneksi SUkses ");
// } else {
// 	echo("KOneksi gagal");
// }

$cekdatabase = new mysqli($host, $username, $password, $db);
// if ($cekdatabase) {
// 	echo("database tersedia ");

// } else {
// 	echo("database tidak tersedia");
// }

?>