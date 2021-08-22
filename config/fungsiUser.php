<?php 

function updatePasswordUser($data, $value)
{
	global $conn;
	if (!updatePasswordAdmin($data, $value)) {
		if (!updatePasswordPemilih($data, $value)) {
			echo "
				<div class='alert bg-danger animated fadeIn text-center text-white footer mb-0'>
					<h5>Data Gagal Diubah</h5>
				</div>";
			echo "<meta http-equiv='refresh' content='1.5;url=profile.php'>";
		} else {

			echo "
				<div class='alert bg-success animated fadeIn text-center text-white footer mb-0'>
					<h5>Data Berhasil Diubah</h5>
				</div>";
			echo "<meta http-equiv='refresh' content='1.5;url=profile.php'>";
		}
	} else {
		echo "
			<div class='alert bg-success animated fadeIn text-center text-white footer mb-0'>
				<h5>Data Berhasil Diubah</h5>
			</div>";
		echo "<meta http-equiv='refresh' content='1.5;url=profile.php'>";
	}
}

function updatePasswordAdmin($data, $value)
{
	global $conn;
	$username = $data['username'];
	$password = password_hash($data['password'], PASSWORD_DEFAULT);

	if ($data['password'] == "") {
		$sql = "UPDATE admin SET username = '$username' WHERE username = '$value' ";
	} else {

		$sql = "UPDATE admin SET username = '$username', password = '$password' WHERE username = '$value' ";
	}

	if ($conn->query($sql)) {
		$_SESSION['admin']['username'] = $username;
		return TRUE;
	} else {
		return FALSE;
	}
}

function updatePasswordPemilih($data, $value)
{
	global $conn;
	$password = password_hash($data['password'], PASSWORD_DEFAULT);
	$sql      = "UPDATE pemilih SET password = '$password' WHERE nim = '$value' ";

	if ($conn->query($sql)) {
		return TRUE;
	} else {
		return FALSE;
	}
}