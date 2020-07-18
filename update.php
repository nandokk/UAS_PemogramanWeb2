<?php 
 
include 'koneksi.php';
$id = $_POST['id'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$provinsi = $_POST['provinsi'];
$email = $_POST['email'];
$no_hp = $_POST['no_hp'];
$keahlian = $_POST['keahlian'];
 
mysqli_query($host,"UPDATE user SET nama='$nama', alamat='$alamat', provinsi='$provinsi', email='$email', no_hp = '$no_hp', keahlian = '$keahlian'  WHERE id='$id'");
 
header("location:index.php");
?>