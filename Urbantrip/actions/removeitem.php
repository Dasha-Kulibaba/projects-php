<?php

require('../components/connection.php');
$returnUrl = $_SERVER['HTTP_REFERER'];
$id = $_GET['id'];


$sql = "DELETE FROM `tours` WHERE id =$id";
mysqli_query($db, $sql);
header('location:' . $returnUrl);
