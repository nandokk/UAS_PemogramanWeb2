<?php 
include 'koneksi.php';
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$provinsi = $_POST['provinsi'];
$email = $_POST['email'];
$no_hp = $_POST['no_hp'];
$keahlian = $_POST['keahlian'];
 
mysqli_query($host,"INSERT INTO user VALUES('','$nama','$alamat','$provinsi','$email','$no_hp','$keahlian')");
 
header("location:index.php");
?>