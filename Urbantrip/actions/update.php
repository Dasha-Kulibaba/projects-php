<?php
require('../components/connection.php');

$name = mysqli_real_escape_string($db, $_POST['name']);
$city_id = mysqli_real_escape_string($db, $_POST['city']);
$descr = mysqli_real_escape_string($db, $_POST['descr']);

if (isset($_FILES['cover'])) {
	$file = $_FILES['cover'];
	if ($file['error'] === UPLOAD_ERR_OK) {
		$original_name = basename($file['name']);
		$new_name = (string)$_GET['id'] . '.jpeg';
		$target_directory = '../img/tours/';
		$target_path = $target_directory . $new_name;
		move_uploaded_file($file['tmp_name'], $target_path);
	}
}

$audio = "example.mp3";

if (isset($_FILES['audio'])) {
	$file = $_FILES['audio'];
	if ($file['error'] === UPLOAD_ERR_OK) {
		$original_name = basename($file['name']);
		$new_name = (string)$_GET['id'] . '.mp3';
		$target_directory = '../audio/';
		$target_path = $target_directory . $new_name;
		move_uploaded_file($file['tmp_name'], $target_path);
		$audio = $_GET['id'] . '.mp3';
	}
}
$cover = $_GET['id'] . '.jpeg';



$sql = "UPDATE `tours` SET `name`='$name',`cover`='$cover',`city_id`='$city_id',`descr`='$descr',`audio`='$audio' WHERE id=" . $_GET['id'];
mysqli_query($db, $sql);
$returnUrl = "/admin/index.php";
header('location:' . $returnUrl);
