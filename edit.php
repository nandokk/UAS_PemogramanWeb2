	<?php 
	include "koneksi.php";
	$id = $_GET['id'];
	$query_mysql = mysqli_query($host,"SELECT * FROM user WHERE id='$id'")or die(mysqli_error());
	$nomor = 1;
	$data = mysqli_fetch_array($query_mysql);
	?>

<!DOCTYPE html>
<html>
<head>
	<title>DATA RELAWAN COVID 19</title>
	<link rel="stylesheet" type="text/css" href="style.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body><br>
 <div class="container col-lg-6">
 	<div class="card">
 	<div class="card-body">
	<a id="ls" class="btn btn-primary" href="index.php">Kembali</a>
 
	<br/>
	<nav class="navbar navbar-light bg-warning">
	  <span class="navbar-brand mb-0 h1">Ubah Data</span>
	</nav>

	<form action="update.php" method="post">
	  <div class="form-group">
	    <label>Nama</label>
	    <input type="text" hidden="" name="id" value="<?php echo $data['id'] ?>">
	    <input type="text" name="nama" class="form-control" value="<?php echo $data['nama'] ?>">
	  </div>	
	  <div class="form-group">
	    <label>Alamat</label>
	    <input type="text" name="alamat" class="form-control" value="<?php echo $data['alamat'] ?>">
	  </div>
	  <div class="form-group">
	    <label>Provinsi</label>
	    <input type="text" name="provinsi" class="form-control" value="<?php echo $data['provinsi'] ?>">
	  </div>
	  <div class="form-group">
	    <label>Email</label>
	    <input type="text" name="email" class="form-control" value="<?php echo $data['email'] ?>">
	  </div>
	  <div class="form-group">
	    <label>No Hp</label>
	    <input type="text" name="no_hp" class="form-control" value="<?php echo $data['no_hp'] ?>">
	  </div>
	  <div class="form-group">
	    <label>Keahlian</label>
	    <input type="text" name="keahlian" class="form-control" value="<?php echo $data['keahlian'] ?>">
	  </div>
	  <input class="btn btn-primary" type="submit" value="Simpan">				
	</form>
</div>
</div>
</div>
</body>
</html>