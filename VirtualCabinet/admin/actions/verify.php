<?php
require('../connect.php');
if (!isset($_POST["email"])) {
	$return = "../../index.php";
	header('location:' . $return);
	exit();
}
$email = $_POST['email'];

if ($_SESSION['email_code'] == $_POST['code']) {
	echo 'Пошта успішно верифікована';
	$query = "SELECT `id` from `users` WHERE `email` LIKE '{$email}'";
	$res = mysqli_query($db, $query);
	if ($res->num_rows > 0) {
		$id = mysqli_fetch_assoc($res);
		var_dump("11111111111");
	} else {
		$insert = "INSERT INTO `users`( `name`, `email`) VALUES ('{$_SESSION['email_name']}','{$email}')";
		var_dump($insert);
		mysqli_query($db, $insert);
		$id = mysqli_fetch_assoc(mysqli_query($db, $query));
		var_dump("2222");
	}

	$_SESSION['email'] = $id['id'];
	unset($_SESSION['email_name'], $_SESSION['email_code']);
	var_dump("333333333");
	var_dump($_SESSION['email_name']);
	$return = "../exhibition/index.php";
	header('location:' . $return);
	exit();
} else {
	echo 'Виникла помилка під час верифікації пошти';
}
