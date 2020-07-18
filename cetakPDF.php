<?php
	include "koneksi.php";
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
require_once __DIR__ . '/vendor/autoload.php';
$mpdf = new \Mpdf\Mpdf();
$html = '
	<!DOCTYPE html>
	<html>
	<head>
		<title>Laporan Relawan</title>
	</head>
	<body>
		<div>
			<h1>Data Relawan Covid19 Wilayah DKI Jakarta</h1>
			<h3>Per '.$date.' '.$waktu.' (Waktu dan Jam Sekarang)</h3>
			<hr>
			<h1>Laporan Relawan</h1>
		</div>
		<table border="1" cellpadding="10" cellspacing="0">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama</th>
          <th>Alamat</th>
          <th>Provinsi</th>
          <th>Email</th>
          <th>No Hp</th>
          <th>Keahlian</th>
        </tr>
      </thead>';
      $query_mysql = mysqli_query($host,"SELECT * FROM user");
      $nomor = 1;
      while($data = mysqli_fetch_array($query_mysql)){
        	$html .= '
        	<tr>
            <td>'.$nomor++.'</td>
            <td>'.$data['nama'].'</td>
            <td>'.$data['alamat'].'</td>
            <td>'.$data['provinsi'].'</td>
            <td>'.$data['email'].'</td>
            <td>'.$data['no_hp'].'</td>
            <td>'.$data['keahlian'].'</td>
          </tr>
        	';
        }
    $html .= '</table>
    <table border="1" cellpadding="10" cellspacing="0">
    </table>
	</body>
	</html>
';
$mpdf->WriteHTML($html);
$mpdf->Output('Laporan-Relawan.pdf',\Mpdf\Output\Destination::INLINE);