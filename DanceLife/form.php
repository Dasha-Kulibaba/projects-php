<?php
require("connect.php");

$returnUrl = $_SERVER['HTTP_REFERER'];
$fd_name = $_POST['fd_name'];
$fd_email = $_POST['fd_email'];
$fd_tel = $_POST['fd_tel'];

if (isset($_POST['fd_comment'])) {
	$fd_comment = $_POST['fd_comment'];
	$sql = "INSERT INTO `form_data`(`fd_name`, `fd_email`, `fd_tel`, `fd_comment`) VALUES ('$fd_name','$fd_email','$fd_tel','$fd_comment')";
	if (mysqli_query($connect, $sql)) {
		header('Location: ' . $returnUrl);
		exit;
	} else {
		echo 'Сталася помилка';
		mysqli_errno($connect);
	}
} else {
	$sql = "INSERT INTO `form_data`(`fd_name`, `fd_email`, `fd_tel`) VALUES ('$fd_name','$fd_email','$fd_tel')";
	if (mysqli_query($connect, $sql)) {
		header('Location: ' . $returnUrl);
		exit;
	} else {
		echo 'Сталася помилка';
		mysqli_errno($connect);
	}
}
