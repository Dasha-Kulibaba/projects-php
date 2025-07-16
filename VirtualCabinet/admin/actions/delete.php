<?php
require('../connect.php');
CheckAdmin();
CheckEdit();

$query = "SELECT `link` FROM `documents` WHERE `id`=" . $_GET['id'];
$item = mysqli_fetch_row(mysqli_query($db, $query));
$delete = "DELETE FROM `documents` WHERE `id`=" . $_GET['id'];

$res = mysqli_query($db, $delete);


if ($res) {
	if (file_exists(dirname(__DIR__) . '\\' . $item[0])) {
		unlink(dirname(__DIR__) . '\\' . $item[0]);
	}
}

$return = "../../index.php";
header('location:' . $return);
exit();
