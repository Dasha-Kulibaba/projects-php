<?php

require('../components/connection.php');
$returnUrl = "/index.php";

$login = $_POST['login'];

$pass = crypt($_POST['password'], 'xx');


$sql = "SELECT * from users where login ='" . $login . "' AND password ='" . $pass . "'";
$res = mysqli_query($db, $sql);
if ($res && $res->num_rows) {
	$row = mysqli_fetch_assoc($res);
	$_SESSION['user'] = $row['id'];
	$res = mysqli_query($db, "SELECT * from admins where user_id=" . $_SESSION['user']);
	if ($res->num_rows == 1) {
		$_SESSION['admin'] = 1;
	} else {
		if (isset($_SESSION['admin'])) {
			unset($_SESSION['admin']);
		}
	}
	header('location:' . $returnUrl);
} else {
	echo ('Трапилася помилка, користувача не знайдено');
}
