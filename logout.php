<?php 
session_start();
session_destroy();
unset($_SESSION['user']);
unset($_SESSION['nim']);
unset($_SESSION['level']);
header("location:index.php");