<?php


include "config/koneksi.php";

if (isset($_SESSION['pemilih'])) {

	header("location:?pemilih=dashboard");

} elseif(isset($_SESSION['admin'])) {

	header("location:?admin=dashboard");

} else {

	header("location:login.php");
	
}