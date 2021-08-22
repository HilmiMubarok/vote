<?php

function sudahMilih()
{
	global $conn;

	$sql = "SELECT * FROM pemilih WHERE status = '1' ";
	$res = $conn->query($sql);

	$num = $res->num_rows;

	return $num;
}

function belumMilih()
{
	global $conn;

	$sql = "SELECT * FROM pemilih WHERE status = '0' ";
	$res = $conn->query($sql);

	$num = $res->num_rows;

	return $num;
}

function pilihKandidat($id)
{
	global $conn; 

	date_default_timezone_set('Asia/Jakarta');
	$tgl = new DateTime();
	$tgl = $tgl->format('Y-m-d H:i:s');

	$pemilihSession = tampilPemilihSession();
	$id_pemilih     = $pemilihSession[0]['id_pemilih'];
	$tampilKandidat = "SELECT * FROM kandidat WHERE id_kandidat = '$id' ";
	$resKandidat    = $conn->query($tampilKandidat);
	$rowKandidat    = $resKandidat->fetch_assoc();


	$saveVote = "INSERT INTO vote VALUES('', '$rowKandidat[id_kandidat]', '$id_pemilih', '$tgl') ";
	
	if ($conn->query($saveVote)) {
		$updateStatus = "UPDATE pemilih SET status = '1' WHERE id_pemilih = '$id_pemilih' ";
		if ($conn->query($updateStatus)) {
			echo "
				<div class='alert bg-success animated fadeIn text-center text-white footer mb-0'>
					<h5>Sukses Anda Telah Melakukan Pemilihan</h5>
				</div>";
			echo "<meta http-equiv='refresh' content='1.5;url=?pemilih=kandidat'>";
		} else {
			echo "
				<div class='alert bg-success animated fadeIn text-center text-white footer mb-0'>
					<h5>Sukses Anda Telah Melakukan Pemilihan</h5>
				</div>";
			echo "<meta http-equiv='refresh' content='1.5;url=?pemilih=kandidat'>";
		}
	}
	
	return $rowKandidat;
}

function lihatSuaraPerCalon($idCalon)
{
	global $conn;

	$sql = "SELECT * FROM user WHERE calon_id = '$idCalon' ";
	$res = $conn->query($sql);

	$num = $res->num_rows;

	return $num;
}

function presentase($idKandidat)
{
	return round(lihatSuaraPerKandidat($idKandidat) / sudahMilih() * 100). "%" ;
}

function getVote()
{
	global $conn;

	$sql = "SELECT kandidat_id FROM vote";
	$res = $conn->query($sql);
	$row = [];

	while ($rows = $res->fetch_assoc()) {
		$row[] = implode("", $rows);
	}
	return implode("", $row);
}

function getPemenang($str)
{	
	$strArray = count_chars($str,1);
	$i        = 0;
	foreach ($strArray as $key=>$value)
	{
		$array[$i][0]=$value;
		$array[$i][1]=chr($key);
		$i++;
	}
	rsort($array);
	$i = 0;
	if($array[0][0] != $array[1][0])
	{
		return "no urut ". $array[0][1]." dinyatakan <strong>MENANG</strong> atas ".$array[0][0]." suara\n";
	}
}