<?php
require('../components/connection.php');

$name = $_POST['country'];

$sql = "INSERT INTO `countries`(`name`) VALUES ('$name ')";
mysqli_query($db, $sql);
$returnUrl = "/admin/countries.php";
header('location:' . $returnUrl);
