<?php


function tampilPanduan()
{
	global $conn;

	$sql = "SELECT * FROM panduan ORDER BY id_panduan DESC LIMIT 1";
	$res = $conn->query($sql);

	$row = $res->fetch_assoc();

	$num = $res->num_rows;

	$data = [
		"panduan" => $row,
		"num" => $num
	];

	return $data;
}

function updatePanduan($data)
{
	global $conn;

	$id    = intval(tampilPanduan()['panduan']['id_panduan']);
	$judul = $data['judul'];
	$isi   = $data['isi'];

	if ($id > 0) {
		// Update Data
		$sql = "UPDATE panduan SET judul = '$judul', isi = '$isi' ";
	} else {
		$sql = "INSERT INTO panduan VALUES('', '$judul', '$isi') ";
		// Add Data
	}

	if ($conn->query($sql)) {
		echo "
			<div class='alert bg-success animated fadeIn text-center text-white footer mb-0'>
				<h5>Data Telah Tersimpan</h5>
			</div>";
		echo "<meta http-equiv='refresh' content='1.5;url=?admin=panduan'>";
	} else {
		echo "
			<div class='alert bg-danger animated fadeIn text-center text-white footer mb-0'>
				<h5>Data Gagal Tersimpan</h5>
			</div>";
		echo "<meta http-equiv='refresh' content='1.5;url=?admin=panduan'>";
	}

}