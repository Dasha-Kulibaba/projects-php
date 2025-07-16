<?php
require('../connect.php');

$login = "";
$password = "";

if ($login == $_POST['login'] && $password == $_POST['password']) {
	$_SESSION['admin'] = 1;
	$return = "../index.php";
	header('location:' . $return);
	exit();
} else {
	if (isset($_SESSION['admin'])) {
		$_SESSION['admin'] = 0;
		unset($_SESSION['admin']);
	}
	$return = "../../index.php";
	header('location:' . $return);
	exit();
}
