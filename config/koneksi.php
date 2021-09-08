<?php

session_start();
error_reporting(0);

$host     = "localhost";
$username = "root";
$password = "";
$database = "votedb";

$conn     = new mysqli($host, $username, $password, $database);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

include 'fungsiPemilih.php';
include 'fungsiAdmin.php';
include 'fungsiVoting.php';
include 'fungsiKandidat.php';
include 'fungsiPanduan.php';
include 'fungsiUmum.php';
include 'fungsiUser.php';
include 'fungsiWaktu.php';
