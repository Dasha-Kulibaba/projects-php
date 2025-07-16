<?php
require('../components/connection.php');

$name = $_POST['city'];
$country = $_POST['country'];

$sql = "INSERT INTO `city`( `name`, `country_id`) VALUES ('$name',$country)";
mysqli_query($db, $sql);
$returnUrl = "/admin/countries.php";
header('location:' . $returnUrl);
