<?php

function resetPemilih($id)
{
	global $conn;

	$sql = "SELECT * FROM pemilih WHERE id_pemilih = '$id' ";
	$res = $conn->query($sql);
	$row = $res->fetch_assoc();


	// Cek pemilih Status
	$status = $row['status'];

	$new_password = password_hash($row['nim'], PASSWORD_DEFAULT);
	if ($status == 1) {
		$update = "UPDATE pemilih SET password = '$new_password', status = 0 WHERE id_pemilih = '$id' "; 
	} else {
		$update = "UPDATE pemilih SET password = '$new_password' WHERE id_pemilih = '$id'"; 
	}

	$sql_update = $conn->query($update);

	if ($sql_update) {
		echo "
			<div class='alert bg-success animated fadeIn text-center text-white footer mb-0'>
				<h5>Data Telah Direset</h5>
			</div>";
		echo "<meta http-equiv='refresh' content='1.5;url=?admin=pemilih'>";
	} else {
		echo "
			<div class='alert bg-danger animated fadeIn text-center text-white footer mb-0'>
				<h5>Data Gagal Direset</h5>
			</div>";
		echo "<meta http-equiv='refresh' content='1.5;url=?admin=pemilih'>";
	}


}

function cekStatus($id)
{
	global $conn;

	$sql = "SELECT * FROM pemilih WHERE id_pemilih = '$id' AND status = 1 ";
	$res = $conn->query($sql);
	// $res
	if ($res->num_rows > 0) {
		// echo "sudah milih";
		return TRUE;
	} else {
		return FALSE;
	}

}

function importPemilih()
{
	global $conn;
	date_default_timezone_set("Asia/Jakarta");

    $nama_file_baru = time().'.xlsx';

    require_once 'assets/PHPExcel/PHPExcel.php';

    $ext         = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION); // Ambil ekstensi filenya apa
    $tmp_file    = $_FILES['file']['tmp_name'];
    move_uploaded_file($tmp_file, 'uploads/'.$nama_file_baru);
    $excelreader = new PHPExcel_Reader_Excel2007();
    $loadexcel   = $excelreader->load("uploads/".$nama_file_baru); // Load file excel
    $sheet       = $loadexcel->getActiveSheet()->toArray(true, true, true);
    $numrow      = 1;

    foreach($sheet as $row){
        $nama       = $row['0'];
        $nim        = $row['1'];
        $password   = password_hash($row['1'], PASSWORD_BCRYPT);

            if($nama == "" && $nim == "" && $password == "")
                continue;

            if($numrow > 1){

                $status = 0;
                $query = "INSERT INTO pemilih VALUES ('', '$nama', '$nim', '$password','$status')";

                if ($conn->query($query)) { $data_ok = true; }

            }
        $numrow++;
    }

    if ($data_ok == true) {
        echo "
			<div class='alert bg-success animated fadeIn text-center text-white footer mb-0'>
				<h5>Data Telah Tersimpan</h5>
			</div>";
		echo "<meta http-equiv='refresh' content='1.5;url=?admin=pemilih'>";
    }
}

function tampilPemilih($id = null)
{
	global $conn;

	if ($id !== null) {
		$sql = "SELECT * FROM pemilih WHERE id_pemilih = '$id' ";
		$res = $conn->query($sql);
		$row = $res->fetch_assoc();
	} else {
		$sql = "SELECT * FROM pemilih ";
		$res = $conn->query($sql);
		$row = [];

		while ($rows = $res->fetch_assoc()) {
			$row[] = $rows;
		}
	}


	return $row;
}

function tampilPemilihSession()
{
	global $conn;

	$nim = $_SESSION['pemilih']['nim'];

	$sql = "SELECT * FROM pemilih WHERE nim = '$nim' ";
	$res = $conn->query($sql);
	$row = [];

	while ($rows = $res->fetch_assoc()) {
		$row[] = $rows;
	}

	return $row;
}

function tambahPemilih($data)
{
	global $conn;

	$nama     = $data['nama_pemilih'];
	$nim      = $data['nim'];
	$password = password_hash($nim, PASSWORD_DEFAULT);

	$sql      = "INSERT INTO pemilih VALUES ('' , '$nama', '$nim', '$password', '0') ";
	if ($conn->query($sql)) {
		echo "
			<div class='alert bg-success animated fadeIn text-center text-white footer mb-0'>
				<h5>Data Telah Tersimpan</h5>
			</div>";
		echo "<meta http-equiv='refresh' content='1.5;url=?admin=pemilih'>";
	}
}

function updatePemilih($data)
{
	global $conn;

	$id       = $_GET['id'];
	$nama     = $data['nama_pemilih'];
	$nim      = $data['nim'];
	$password = password_hash($nim, PASSWORD_DEFAULT);

	$sql      = "UPDATE pemilih SET nama_pemilih = '$nama', nim = '$nim', password = '$password' WHERE id_pemilih = '$id' ";
	if ($conn->query($sql)) {
		echo "
			<div class='alert bg-success animated fadeIn text-center text-white footer mb-0'>
				<h5>Data Telah Tersimpan</h5>
			</div>";
		echo "<meta http-equiv='refresh' content='1.5;url=?admin=pemilih'>";
	}
}


function loginPeamilih($data)
{
	global $conn;

	$username = $data['username'];
	$password = $data['password'];

	$sql      = "SELECT * FROM user WHERE username = '$username' AND password = '$password' AND expired = 'N' ";
	$res      = $conn->query($sql);
	$row      = $res->fetch_assoc();
	$user     = $row['username'];

	if ($res->num_rows === 1) {
		$_SESSION['user'] = $user;

		echo "
			<div class='alert bg-success animated fadeIn text-center text-white footer mb-0'>
				<h5>Login Sukses</h5>
			</div>";
		echo "<meta http-equiv='refresh' content='1.5;url=?page=dashboarduser'>";
	} else {
		echo "
			<div class='alert bg-danger animated fadeIn text-center text-white footer mb-0'>
				<h5>Login Gagal</h5>
			</div>";
		echo "<meta http-equiv='refresh' content='1.5;url=index.php'>";
	}
}

function jumlahPemilih()
{
	global $conn;

	$sql = "SELECT * FROM pemilih ";
	$res = $conn->query($sql);

	$num = $res->num_rows;
	return $num;
}

function hapusPemilih($id)
{
	global $conn;

	// Cek apakah pemilih sudah melakukan voting atau belum
	$status = cekStatus($id);

	// status == true sudah milih
	if ($status == TRUE) {
		$sql  = "DELETE FROM pemilih WHERE id_pemilih = '$id' ";
		$sql2 = "DELETE FROM vote WHERE pemilih_id = '$id' ";
		if ($conn->query($sql) && $conn->query($sql2)) {

			echo "
				<div class='alert bg-success animated fadeIn text-center text-white footer mb-0'>
					<h5>Data Berhasil Dihapus</h5>
				</div>";
			echo "<meta http-equiv='refresh' content='1.5;url=?admin=pemilih'>";
				
		} else {
			echo "
				<div class='alert bg-danger animated fadeIn text-center text-white footer mb-0'>
					<h5>Data Gagal Dihapus</h5>
				</div>";
			echo "<meta http-equiv='refresh' content='1.5;url=?admin=pemilih'>";
		}
	} else {
		$sql = "DELETE FROM pemilih WHERE id_pemilih = '$id' ";
		if ($conn->query($sql)) {

			echo "
				<div class='alert bg-success animated fadeIn text-center text-white footer mb-0'>
					<h5>Data Berhasil Dihapus</h5>
				</div>";
			echo "<meta http-equiv='refresh' content='1.5;url=?admin=pemilih'>";
				
		} else {
			echo "
				<div class='alert bg-danger animated fadeIn text-center text-white footer mb-0'>
					<h5>Data Gagal Dihapus</h5>
				</div>";
			echo "<meta http-equiv='refresh' content='1.5;url=?admin=pemilih'>";
		}
	}

}