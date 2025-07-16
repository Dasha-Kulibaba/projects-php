<?php
require('../components/connection.php');

$name = mysqli_real_escape_string($db, $_POST['name']);
$city_id = mysqli_real_escape_string($db, $_POST['city']);
$descr = mysqli_real_escape_string($db, $_POST['descr']);

$id = mysqli_fetch_array(mysqli_query($db, 'SELECT MAX(id) as max_id from tours'));
$id['max_id']++;

if (isset($_FILES['cover'])) {
	$file = $_FILES['cover'];
	if ($file['error'] === UPLOAD_ERR_OK) {
		$original_name = basename($file['name']);
		$new_name = (string)$id['max_id'] . '.jpeg';
		$target_directory = '../img/tours/';
		$target_path = $target_directory . $new_name;
		move_uploaded_file($file['tmp_name'], $target_path);
	}
}

if (isset($_FILES['audio'])) {
	$file = $_FILES['audio'];
	if ($file['error'] === UPLOAD_ERR_OK) {
		$original_name = basename($file['name']);
		$new_name = (string)$id['max_id'] . '.mp3';
		$target_directory = '../audio/';
		$target_path = $target_directory . $new_name;
		move_uploaded_file($file['tmp_name'], $target_path);
		$audio = $id['max_id'] . '.mp3';
	}
} else {
	$audio = $_GET['id'] . '.mp3';
}



$cover = $id['max_id'] . '.jpeg';



$sql = "INSERT INTO `tours` (`name`, `cover` , `city_id`, `descr`, `audio`) VALUES('$name', '$cover', $city_id, '$descr','$audio')";
mysqli_query($db, $sql);
$returnUrl = "/admin/index.php";
header('location:' . $returnUrl);
