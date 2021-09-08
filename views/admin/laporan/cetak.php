<?php 

require_once '../../../config/koneksi.php';
require_once '../../../vendor/autoload.php';

$kandidat = tampilKandidat();
$vote = getVote();
$menang = getPemenang($vote);

use Mpdf\Mpdf;
use Nim4n\SimpleDate;

$html = '
<html>
<head>
<style>
body {font-family: sans-serif;
	font-size: 10pt;
}
p {	margin: 0pt; }
table.items {
	border: 0.1mm solid #000000;
}
td { vertical-align: top; }
.items td {
	border-left: 0.1mm solid #000000;
	border-right: 0.1mm solid #000000;
}
table thead td { background-color: #EEEEEE;
	text-align: center;
	border: 0.1mm solid #000000;
	font-variant: small-caps;
}
.items td.blanktotal {
	background-color: #EEEEEE;
	border: 0.1mm solid #000000;
	background-color: #FFFFFF;
	border: 0mm none #000000;
	border-top: 0.1mm solid #000000;
	border-right: 0.1mm solid #000000;
}
.items td.totals {
	text-align: right;
	border: 0.1mm solid #000000;
}
.items td.cost {
	text-align: "." center;
}
</style>
</head>
<body>
<!--mpdf
<htmlpageheader name="myheader">
<table width="100%">
	<tr>
	    <td rowspan="4">
	    	<img src="../../../assets/images/uniss.jpg" width="100">
	    </td>
	    <td align="center">UNIVERSITAS SELAMAT SRI</td>
	    <td rowspan="4"><img src="../../../assets/images/bem.jpg" width="100"></td>
	  </tr>
	  <tr>
	    <td align="center">BADAN EKSEKUTIF MAHASISWA (BEM)</td>
	  </tr>
	  <tr>
	    <td align="center">PERIODE 2021-2022</td>
	  </tr>
	  <tr>
	    <td align="center">Alamat : Jalan Soekarno-Hatta Km 03 Kendal, Jawa Tengah. Telp.(0294)3689259 </td>
	  </tr>
</table>
<div style="border-top: 1px solid #000000; font-size: 9pt; text-align: center; padding-top: 5mm; margin-top:2px; ">
</htmlpageheader>
<htmlpagefooter name="myfooter">
<div style="border-top: 1px solid #000000; font-size: 9pt; text-align: center; padding-top: 3mm; ">
Page {PAGENO} of {nb}
</div>
</htmlpagefooter>
<sethtmlpageheader name="myheader" value="on" show-this-page="1" />
<sethtmlpagefooter name="myfooter" value="on" />
mpdf-->
<div style="text-align: center">Laporan Pelaksanaan pemilihan ketua BEM</div> <br>
<div style="text-align: center">Universitas Selamat Sri Kendal periode 2021-2022</div> <br>
<div style="text-align: left; line-height: 2;">
	Dengan Rahmat Allah SWT. Pada hari ini telah dilaksanakan perhitungan suara peilihan ketua bem universitas selamat sri menggunakan aplikasi e- voting bem uniss, dengan hasil perhitungan sebagai berikut: <br>
hari/tanggal pelaksanaan: '. SimpleDate::dayDate($_POST["hari_pelaksanaan"]) .' <br>
Total pemilih: '.jumlahPemilih().' <br>
Total suara masuk: '.sudahMilih().' <br>
Total suara tidak masuk: '.belumMilih().' <br>
Dengan rincian jumlah suara dan persentase pada masing- masing kandidat sebagai berikut: <br>
</div>

<table width="100%" border="1">
	<tr>
		<th>Nomor Kandidat</th>
		<th>Nama Kandidat</th>
		<th>Jumlah Suara</th>
		<th>Presentase Suara</th>
	</tr>';
	foreach ($kandidat as $k): $html .= '
	<tr>
		<td>'. $k["id_kandidat"] .'</td>
		<td>'. $k["nama_kandidat"] .'</td>
		<td>'. lihatSuaraPerKandidat($k["id_kandidat"]) .'</td>
		<td>'. presentase($k["id_kandidat"]) .'</td>
	</tr>';
	endforeach;
	$html .= '</table>

<div style="text-align:left; line-height: 2;">
	telah didapat hasil perhitungan suara bahwa '.
$menang
	.' <br>

Demikian laporan ini dibuat sebagaimana mestinya.
</div>

<div style="text-align: right">
	Kendal, '. date("d-m-Y") .'
</div>
<div style="text-align: center">
	Mengetahui,
</div>
<br>
<br>
<br><br>
<br>

<table width="100%">
	<tr>
		<td style="text-align:left; width:50%">Ketua Pelaksana</td>
		<td style="text-align:right; width:50%">Sekertaris</td>
	</tr>
	<br><br><br><br><br><br><br><br><br>
	<tr>
		<td style="text-align:left; width:50%">'. $_POST["ketua"] .'</td>
		<td style="text-align:right; width:50%">'. $_POST["sekertaris"] .'</td>
	</tr>
	<tr>
		<td style="text-align:left; width:50%">'. $_POST["nim_ketua"] .'</td>
		<td style="text-align:right; width:50%">'. $_POST["nim_sekertaris"] .'</td>
	</tr>
</table>
</html>
';



$mpdf = new Mpdf([
	'margin_left' => 20,
	'margin_right' => 15,
	'margin_top' => 48,
	'margin_bottom' => 25,
	'margin_header' => 10,
	'margin_footer' => 10
]);

$mpdf->SetDisplayMode('fullpage');

$mpdf->WriteHTML($html);

$file_name = "Laporan E-Voting BEM - ".time(). ".pdf";

$mpdf->Output($file_name, "D");
