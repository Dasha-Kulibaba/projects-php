<?php
$returnUrl = $_SERVER['HTTP_REFERER'];
$connect = mysqli_connect("localhost", "root", "", "ShosTam");
$name = $_POST['username'];
$number = $_POST['userphone'];
$email = $_POST['useremail'];
$text = $_POST['usertext'];
$sql = "INSERT INTO `feedback`(`feed_id`, `username`, `userphone`, `useremail`, `userquestion`) VALUES (NULL,'$name','$number','$email','$text')";
$result = mysqli_query($connect, $sql);
if ($result) {
	header('Location: ' . $returnUrl);
	exit;
}
