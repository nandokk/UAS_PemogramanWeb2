<?php 
include 'koneksi.php';
 
$username = $_POST['username'];
$password = $_POST['password'];
 
$query = mysqli_query($host,"select * from login where username='$username' and password='$password'");
$cek = mysqli_num_rows($query);

if($cek == 1){
	session_start();
	$_SESSION['username'] = $username;
	$_SESSION['login'] = true;
	header("location:index.php");
}else{
	header("location:login.php");
}
?>