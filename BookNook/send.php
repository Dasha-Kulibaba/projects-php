<?php
require_once('db.php');
$returnUrl = $_SERVER['HTTP_REFERER'];
$name = $_POST['username'];
$email = $_POST['useremail'];
$text = $_POST['usertext'];

$sql = "INSERT INTO `feedback`(`feedback__id`, `username`, `useremail`, `usertext`) VALUES (NULL,'$name','$email','$text')";
if (mysqli_query($connect, $sql)) {
	header('location:' . $returnUrl);
}
