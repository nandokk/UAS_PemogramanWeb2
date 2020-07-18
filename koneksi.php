<?php 
// isi nama host, username mysql, dan password mysql anda
$host = mysqli_connect("localhost","root","","relawan_covid");
 
if($host){
	
}else{
	echo "koneksi gagal.<br/>";
}
// isikan dengan nama database yang akan di hubungkan
$db = mysqli_select_db($host,"relawan_covid");
 
if($db){
	
}else{
	echo "koneksi database gagal.";
}
?>