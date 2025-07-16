<?php

require('../components/connection.php');
$returnUrl = $_SERVER['HTTP_REFERER'];
$like = (int)$_GET['like'];
$id = (int)$_SESSION['user'];

$sql = "INSERT INTO favorite (`id`, `user_id`, `tour_id`) VALUES (NULL, $id , $like )";
mysqli_query($db, $sql);
header('location:' . $returnUrl);
