	<?php 
	session_start();
	if(!isset($_SESSION['login'])){
		header("location:login.php");
	}
	$waktu = date_default_timezone_set('Asia/Jakarta');
	$waktu = date('H:i:s');
		function tgl_indo($tanggal){
		$bulan = array (
			1 =>   'Januari',
			'Februari',
			'Maret',
			'April',
			'Mei',
			'Juni',
			'Juli',
			'Agustus',
			'September',
			'Oktober',
			'November',
			'Desember'
		);
		$pecahkan = explode('-', $tanggal);
		return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
	}
	$date = tgl_indo(date('Y-m-d'));
	?>
<!DOCTYPE html>
<html>
<head>
	<title>DATA RELAWAN COVID 19</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
	<div class="container">
	<div class="jumbotron jumbotron-fluid">
	  <div class="container">
	    <h1 class="display-4">Data Relawan Covid19 Wilayah DKI Jakarta</h1>
	    <p class="lead">Per <?php echo $date."&nbsp;".$waktu ?> (Waktu dan Jam Sekarang)</p>
	    <p class="text-right bg-info" style="color: white">Hii <?php echo $_SESSION['username']; ?> &emsp;</p>
	  </div>
</div>
 
	<div id="tb" class="p-3 mb-2 bg-secondary text-white"><h4>Data Relawan</h4></div>

		<a id="td" class="btn btn-success" href="input.php">+ Tambah Data Baru</a>
		<a id="td" class="btn btn-danger" target="_blank" href="cetakPDF.php">Cetak PDF</a>
		<a id="tds" class="btn btn-danger" href="logout.php">Logout</a>
	
	<table border="1" class="table">
		<tr>
			<th>No</th>
			<th>Nama Lengkap</th>
			<th>Alamat</th>
			<th>Provinsi</th>
			<th>Email</th>
			<th>No Hp</th>
			<th>Keahlian</th>
			<th>Opsi</th>		
		</tr>
		<?php 
		include "koneksi.php";
		$query_mysql = mysqli_query($host,"SELECT * FROM user");
		$nomor = 1;
		while($data = mysqli_fetch_array($query_mysql)){
		?>
		<tr>
			<td><?php echo $nomor++; ?></td>
			<td><?php echo $data['nama']; ?></td>
			<td><?php echo $data['alamat']; ?></td>
			<td><?php echo $data['provinsi']; ?></td>
			<td><?php echo $data['email']; ?></td>
			<td><?php echo $data['no_hp']; ?></td>
			<td><?php echo $data['keahlian']; ?></td>
			<td>
				<a class="btn btn-warning" href="edit.php?id=<?php echo $data['id']; ?>">Edit</a> |
				<a class="btn btn-danger" href="hapus.php?id=<?php echo $data['id']; ?>">Hapus</a>					
			</td>
		</tr>
		<?php } ?>
	</table><br>
</div>
</body>
</html>