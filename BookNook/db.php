<?php
session_start();
$host = "localhost";
$name = "root";
$password = "";
$dbname = "BookNook";

$connect  = mysqli_connect($host, $name, $password, $dbname);
if ($connect === false) {
	die("ПОМИЛКА: Неможливо підключитися. " . mysqli_connect_error());
}

if (isset($_GET['genre'])) {
	$_SESSION['genre'] = $_GET['genre'];
}
if (isset($_GET['author'])) {
	$_SESSION['author'] = $_GET['author'];
}
if (isset($_GET['search'])) {
	$_SESSION['search'] =  $_GET['search'];
}
