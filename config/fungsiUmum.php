<?php

function login($data)
{
	
	global $conn;

	if (!loginPemilih($data)) {
		if (!loginAdmin($data)) {
			echo "
				<div class='alert bg-danger animated fadeIn text-center text-white footer mb-0'>
					<h5>Login Gagal</h5>
				</div>";
			echo "<meta http-equiv='refresh' content='1.5;url=login.php'>";
		} else {
			echo "
				<div class='alert bg-success animated fadeIn text-center text-white footer mb-0'>
					<h5>Login Sukses</h5>
				</div>";
			echo "<meta http-equiv='refresh' content='1.5;url=page.php?admin=dashboard'>";
		}
	} else {
		echo "
			<div class='alert bg-success animated fadeIn text-center text-white footer mb-0'>
				<h5>Login Sukses</h5>
			</div>";
		echo "<meta http-equiv='refresh' content='1.5;url=page.php?pemilih=dashboard'>";
	}
	
}

function loginPemilih($data)
{
	global $conn;

	$nim          = $data['username'];
	$password     = $data['password'];

	$sql          = "SELECT * FROM pemilih WHERE nim = '$nim' ";
	$res          = $conn->query($sql);
	$row          = $res->fetch_assoc();
	$row_password = $row['password'];

	if ($res->num_rows == 1) {
		if (password_verify($password, $row_password)) {
			$_SESSION['pemilih'] = $row;
			return TRUE;
		} else {
			return FALSE;
		}
	} else {
		return FALSE;
	}
}

function loginAdmin($data)
{
	global $conn;

	$username     = $data['username'];
	$password     = $data['password'];

	$sql          = "SELECT * FROM admin WHERE username = '$username' ";
	$res          = $conn->query($sql);
	$row          = $res->fetch_assoc();
	$row_password = $row['password'];

	if ($res->num_rows == 1) {
		if (password_verify($password, $row_password)) {
			$_SESSION['admin'] = $row;
			return TRUE;
		} else {
			return FALSE;
		}
	} else {
		return FALSE;
	}
}


function getUser($value)
{
	global $conn;

	if (!getAdmin($value)) {
		return getPemilih($value);
	} else {
		return getAdmin($value);
	}
	
}

function getAdmin($username)
{
	global $conn;
	$sql = "SELECT * FROM admin WHERE username = '$username' ";
	$res = $conn->query($sql);
	$row = $res->fetch_assoc();

	if ($res->num_rows == 1) {
		return $row;
	} else {
		return false;
	}

}

function getPemilih($nim)
{
	global $conn;
	$sql = "SELECT * FROM pemilih WHERE nim = '$nim' ";
	$res = $conn->query($sql);
	$row = $res->fetch_assoc();

	if ($res->num_rows == 1) {
		return $row;
	} else {
		return false;
	}
}

function baseUrl($dir = "")
{
	return "http://localhost:8000/vote/" .$dir;
	// return "https://5bc4-36-72-219-157.ngrok.io/vote/" .$dir;
}

function noSession($sess, $loc)
{
	if ( !isset($_SESSION["$sess"]) ) {
		header("location:".$loc);
	}
}

function hasSession($sess, $loc)
{
	if ( isset($_SESSION["$sess"]) ) {
		header("location:".$loc);
	}
}

function delSession($sess)
{
	if ( isset($_SESSION["$sess"]) ) {
		unset($_SESSION["$sess"]);
	}
}

function antiInjek($data)
{
	global $conn;
	return htmlspecialchars(stripcslashes(mysqli_real_escape_string($conn, $data)));
}