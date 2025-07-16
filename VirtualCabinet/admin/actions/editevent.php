<?php

require('../connect.php');
CheckAdmin();
CheckData();

$data = [
	"name" => mysqli_real_escape_string($db, $_POST['name']),
	"date" => $_POST['date'],
	"time" => $_POST['time'],
	"frequency" => $_POST['frequency'],
	"upd_date" => date("Y-m-d")
];


$update = "UPDATE `events` SET `name`='$data[name]',`date`='$data[date]',`frequency`=$data[frequency],`time`='$data[time]',`upd_date`='$data[upd_date]' WHERE `id`=" . $_POST['id'];

mysqli_query($db, $update);

$return = "../calendar/calendar.html";
header('location:' . $return);
