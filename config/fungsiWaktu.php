<?php

function getWaktuPemilihan()
{
	global $conn;

	$sql = "SELECT * FROM waktu";
	$res = $conn->query($sql);

	if ($res->num_rows > 0) {
		return TRUE;
	} else {
		return FALSE;
	}
}