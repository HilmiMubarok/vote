<?php

function tampilKandidat($is_api = null)
{
	global $conn; 

	if ($is_api !== null) {
		header('Content-type: application/json');
		$sql = "SELECT * FROM kandidat";
		$res = $conn->query($sql);
		$row = [];
		$jml = [];

		while ($rows = $res->fetch_assoc()) {
			$row[] = $rows;
		}

		for ($i=0; $i < count($row); $i++) { 
			array_push($jml, lihatSuaraPerKandidat($row[$i]['id_kandidat']));
		}

		array_push($row, $jml);

		echo json_encode($row);

	} else {

		$sql = "SELECT * FROM kandidat";
		$res = $conn->query($sql);
		$row = [];

		while ($rows = $res->fetch_assoc()) {
			$row[] = $rows;
		}
		return $row;
	}

}

function lihatSuaraPerKandidat($id)
{
	global $conn;

	$sql = "SELECT * FROM vote WHERE kandidat_id = '$id' ";
	$res = $conn->query($sql);

	$num = $res->num_rows;

	return $num;
}

function tambahKandidat($data, $foto)
{
	global $conn; 

	$nama     = antiInjek($data['nama_kandidat']);
	$fakultas = antiInjek($data['fakultas_kandidat']);
	$foto     = uploadFotoKandidat();
	$visi     = $data['visi_kandidat'];
	$misi     = $data['misi_kandidat'];
	$proker   = $data['proker_kandidat'];

	if ($foto) {
		$sql = "INSERT INTO kandidat VALUES ('', '$nama', '$foto', '$fakultas', '$visi', '$misi', '$proker' )";
		if ($conn->query($sql)) {
			echo "
				<div class='alert bg-success animated fadeIn text-center text-white footer mb-0'>
					<h5>Data Telah Tersimpan</h5>
				</div>";
			echo "<meta http-equiv='refresh' content='1.5;url=?admin=kandidat'>";
		} else {
			echo "
				<div class='alert bg-danger animated fadeIn text-center text-white footer mb-0'>
					<h5>Data Gagal Tersimpan</h5>
				</div>";
			echo "<meta http-equiv='refresh' content='1.5;url=?admin=tambah-kandidat'>";
		}
	} else {
		echo "
			<div class='alert bg-danger animated fadeIn text-center text-white footer mb-0'>
				<h5>Foto Gagal Diupload</h5>
			</div>";
		echo "<meta http-equiv='refresh' content='1.5;url=?admin=tambah-kandidat'>";
	}
}

function uploadFotoKandidat()
{
	$namaFoto = $_FILES['foto_kandidat']['name'];
	$tmpFoto  = $_FILES['foto_kandidat']['tmp_name'];
	$pathTo   = "assets/images/kandidat/".$namaFoto;

	move_uploaded_file($tmpFoto, $pathTo);

	return $namaFoto;
}

function cekFakultasKandidat($jurusan)
{
	if ($jurusan == "TI") {
		return "Informatika";
	} elseif ($jurusan == "DKV") {
		return "Desain Komunikasi dan Visual";
	}
}

function editKandidat($id)
{
	global $conn; 

	$sql = "SELECT * FROM kandidat WHERE id_kandidat = '$id' ";
	$res = $conn->query($sql);
	$row = $res->fetch_assoc();
	
	return $row;
}

function updateKandidat($data, $id)
{
	global $conn; 

	$nama     = antiInjek($data['nama_kandidat']);
	$fakultas = antiInjek($data['fakultas_kandidat']);
	$foto     = uploadFotoKandidat();
	$visi     = $data['visi_kandidat'];
	$misi     = $data['misi_kandidat'];
	$proker   = $data['proker_kandidat'];

	if ($foto) {
		$sql = "UPDATE kandidat SET nama_kandidat = '$nama', foto_kandidat = '$foto', fakultas_kandidat = '$fakultas', visi = '$visi', misi = '$misi', proker = '$proker' WHERE id_kandidat = '$id' ";
		if ($conn->query($sql)) {
			echo "
				<div class='alert bg-success animated fadeIn text-center text-white footer mb-0'>
					<h5>Data Telah Terupdate</h5>
				</div>";
			echo "<meta http-equiv='refresh' content='1.5;url=?admin=kandidat'>";
		} else {
			echo "
				<div class='alert bg-danger animated fadeIn text-center text-white footer mb-0'>
					<h5>Data Gagal Terupdate</h5>
				</div>";
			echo "<meta http-equiv='refresh' content='1.5;url=?admin=kandidat'>";
		}
	} else {
		$sql = "UPDATE kandidat SET nama_kandidat = '$nama', fakultas_kandidat = '$fakultas', visi = '$visi', misi = '$misi', proker = '$proker' WHERE id_kandidat = '$id' ";
		if ($conn->query($sql)) {
			echo "
				<div class='alert bg-success animated fadeIn text-center text-white footer mb-0'>
					<h5>Data Telah Terupdate</h5>
				</div>";
			echo "<meta http-equiv='refresh' content='1.5;url=?admin=kandidat'>";
		} else {
			echo "
				<div class='alert bg-danger animated fadeIn text-center text-white footer mb-0'>
					<h5>Data Gagal Terupdate</h5>
				</div>";
			echo "<meta http-equiv='refresh' content='1.5;url=?admin=kandidat'>";
		}
	}
}

function hapusKandidat($id)
{
	global $conn;

	$fotoKandidat    = editKandidat($id);
	$rowFotoKandidat = "assets/images/kandidat/".$fotoKandidat['foto_kandidat'];

	$sql = "DELETE FROM kandidat WHERE id_kandidat = '$id' ";
	if ($conn->query($sql)) {
		if (file_exists($rowFotoKandidat)) {
			unlink($rowFotoKandidat);
		}
		echo "
			<div class='alert bg-success animated fadeIn text-center text-white footer mb-0'>
				<h5>Data Telah Tehapus</h5>
			</div>";
		echo "<meta http-equiv='refresh' content='1.5;url=?admin=kandidat'>";
	}
}

function jumlahKandidat()
{
	global $conn;

	$sql = "SELECT * FROM kandidat";
	$res = $conn->query($sql);

	$num = $res->num_rows;
	return $num;
}