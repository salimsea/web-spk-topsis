<?php 
session_start();
include "config/koneksi.php";


$username = $_POST['username'];
$password = md5($_POST['password']); 

$login = mysqli_query($konek,"SELECT * FROM tbl_user WHERE username='$username'");
$data = mysqli_fetch_array($login);


if(mysqli_num_rows($login)==1){
	$_SESSION['username']=$data['username'];
	$_SESSION['password']=$data['password'];
	$_SESSION['nama']=$data['nama'];

	header('location:admin/index.php');
} else {
	header('location:index.php?error=4');
}

?>