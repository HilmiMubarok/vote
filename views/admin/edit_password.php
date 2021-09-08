<?php

$value = ( isset($_SESSION['admin']) ? $_SESSION['admin']['username'] : $_SESSION['pemilih']['nim'] );

if(updatePasswordAdmin($_POST, $value)) {
	echo "
		<div class='alert bg-success animated fadeIn text-center text-white footer mb-0'>
			<h5>Data Berhasil Diubah</h5>
		</div>";
	echo "<meta http-equiv='refresh' content='1.5;url=profile.php'>";
}  else {
	echo "
		<div class='alert bg-danger animated fadeIn text-center text-white footer mb-0'>
			<h5>Data Gagal Diubah</h5>
		</div>";
	echo "<meta http-equiv='refresh' content='1.5;url=profile.php'>";
}


?>