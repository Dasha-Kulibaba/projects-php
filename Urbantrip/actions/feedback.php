<?php

require('../components/connection.php');
$returnUrl = "/index.php";

$email = $_POST['email'];
$message = $_POST['message'];


$sql = "INSERT INTO feedbacks (`id`, `email`, `message`) VALUES (NULL, '" . $email . "' , '" . $message . "')";
mysqli_query($db, $sql);
header('location:' . $returnUrl);
