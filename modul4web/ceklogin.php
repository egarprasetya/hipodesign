<?php  
include "koneksi.php";
session_start();
if (isset($_POST['submit'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];

	$sql = mysqli_query($con,"select * from user where username = '$username' and password= '$password'" );
	// $row = mysqli_fetch_array($sql);

	if (mysqli_num_rows($sql) == 1) {
		while ($data = mysqli_fetch_array($sql)) {
			$_SESSION ['UserID'] = $data ['id_user'];
			$_SESSION ['username'] = $data ['username'];
			$_SESSION ['password'] = $data ['password'];
			$_SESSION ['level'] = $data ['level'];
			$_SESSION['loggedin'] = 1;
			if ($_SESSION ['level'] == 1) {
				header('location:home_admin.php');
			} else if ($_SESSION ['level'] == 2) {
				header('location:index.php');
			}
		}
	} else {
		//kalau username ataupun password gak terdaftar
		header('location:login.php?error=gak_terdaftar');
	}

	// if ($row ['username'] == $username AND $row ['password'] == $password) {

	// 	echo "<script> alert ('berasil login')  </script>";
	// 	header("Location:home_admin.php");

	// } else {
	// 	echo "<script> alert ('password anda kliru')  </script>";
	// }
}

?>