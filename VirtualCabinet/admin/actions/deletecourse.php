<?php
require('../connect.php');
CheckAdmin();
CheckEdit();

$delete = "DELETE FROM `courses` WHERE `id`=" . $_GET['id'];
$res = mysqli_query($db, $delete);

$return = "../../html/qual.php";
header('location:' . $return);
exit();
