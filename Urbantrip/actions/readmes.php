<?php
require('../components/connection.php');

$id = $_GET['id'];

$sql = "UPDATE `feedbacks` SET `is_read`=1 WHERE id=" . $_GET['id'];
mysqli_query($db, $sql);
$returnUrl = "/admin/messages.php";
header('location:' . $returnUrl);
