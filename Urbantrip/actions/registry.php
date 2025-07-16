<?php

require('../components/connection.php');
$returnUrl = "/index.php";


$login = $_POST['login'];
$password = crypt($_POST['password'], 'xx');


$sql = "SELECT * from users where login ='" . $login . "' AND password ='" . $password . "'";
$res = mysqli_query($db, $sql);;

if ($res->num_rows === 0) {
	$insert = "INSERT INTO users (`id`, `login`, `password`) VALUES (NULL,'$login', '$password')";
	mysqli_query($db, $insert);
	$user = mysqli_fetch_array(mysqli_query($db, "SELECT * from users WHERE login like '$login'"));
	$_SESSION['user'] =  $user['id'];
	header('location:' . $returnUrl);
} else {
	echo ('Користувач з таким логіном вже існує, авторизуйтесь');
}
