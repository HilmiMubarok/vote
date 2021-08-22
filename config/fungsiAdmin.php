<?php

function tampilAdmin()
{
	global $conn;

	$sql = "SELECT * FROM admin";
	$res = $conn->query($sql);
	$rows = [];

	while ($row = $res->fetch_assoc()) {
		$rows[] = $row;
	}

	return $rows;
}

function tambahAdmin($data)
{
	global $conn;

	$username = $data['username'];
	$password = password_hash($data['password'], PASSWORD_DEFAULT);

	$sql      = "INSERT INTO admin VALUES ('' , '$username', '$password') ";
	if ($conn->query($sql)) {
		echo "
			<div class='alert bg-success animated fadeIn text-center text-white footer mb-0'>
				<h5>Data Telah Tersimpan</h5>
			</div>";
		echo "<meta http-equiv='refresh' content='1.5;url=?admin=manajemen-admin'>";
	}
}

function aturWaktu($value)
{
	// header('Content-type: application/json');
	global $conn;

	$waktu_selesai = $value;

	$ceksql = "SELECT * FROM waktu";
	$cekres = $conn->query($ceksql);

	if ($cekres->num_rows > 0) {
		echo "Ada Yang Sudah Mulai";
	} else {
		$sql = "INSERT INTO waktu VALUES ('', '$waktu_selesai')";
		if ($conn->query($sql)) {
			echo "Sukses";
		} else {
			echo "Gagal";
		}

	}
}

function hapusWaktu()
{
	header('Content-type: application/json');
	global $conn;

	$waktu_selesai = $value;

	$sql = "DELETE FROM waktu";
	$res = $conn->query($sql);

	if ($conn->query($sql)) {
		echo "Sukses Hapus";
	} else {
		echo "Gagal Hapus";
	}
}

function getWaktu()
{
	header('Content-type: application/json');
	global $conn;


	$sql = "SELECT * FROM waktu";
	$res = $conn->query($sql);

	if ($res->num_rows > 0) {
		echo json_encode($res->fetch_assoc());
	} else {
		echo http_response_code(500);

	}
}

function logisnAdmin($data)
{
	global $conn;
	
	$username = $data['username'];
	$password = $data['password'];
	$sql      = "SELECT * FROM admin WHERE username = '$username' ";
	$res      = $conn->query($sql);

	if ($res->num_rows === 1) {

		$row  = $res->fetch_assoc();
		$usr  = $row['username'];
		if ( password_verify($password, $row['password']) ) {

			$_SESSION['admin'] = "$usr";
			echo "
				<div class='alert bg-success animated fadeIn text-center text-white footer mb-0'>
					<h5>Login Sukses</h5>
				</div>";
			echo "<meta http-equiv='refresh' content='1.5;url=?page=dashboard'>";
		} else {
			echo "
				<div class='alert bg-danger animated fadeIn text-center text-white footer mb-0'>
					<h5>Login Gagal</h5>
				</div>";
			echo "<meta http-equiv='refresh' content='1.5;url=../admin'>";
		}
	} else {
		echo "
			<div class='alert bg-danger animated fadeIn text-center text-white footer mb-0'>
				<i class='fa fa-ban'></i> <h5 class='d-inline-block'>Username Tidak Terdaftar</h5>
			</div>";
		echo "<meta http-equiv='refresh' content='1.5;url=../admin'>";
	}
}