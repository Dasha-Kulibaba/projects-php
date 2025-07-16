<?php
require('../connect.php');
CheckAdmin();
CheckEdit();

$delete = "DELETE FROM `weeks` WHERE `id`=" . $_GET['id'];
$res = mysqli_query($db, $delete);

$return = "../calendar/calendar.html";
header('location:' . $return);
exit();
