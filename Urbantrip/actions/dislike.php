<?php

require('../components/connection.php');
$returnUrl = $_SERVER['HTTP_REFERER'];
$like = $_GET['like'];


$sql = "DELETE FROM `favorite` WHERE tour_id =$like";
mysqli_query($db, $sql);
header('location:' . $returnUrl);
