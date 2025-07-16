<?php

require('../connect.php');
CheckAdmin();
CheckData();


$month = explode("-", $_POST['month']);
$data = [
	"title" => mysqli_real_escape_string($db, $_POST['title']),
	"week_number" => $_POST['week_number'],
	"month" => $month[1],
	"year" =>  (int)$month[0],
	"upd_date" => date("Y-m-d")
];


$update = "UPDATE `weeks` SET `title`='$data[title]',`month`='$data[month]',`year`='$data[year]',`week_number`='$data[week_number]',`upd_date`='$data[upd_date]' WHERE `id`=" . $_POST['id'];

mysqli_query($db, $update);

$return = "../calendar/calendar.html";
header('location:' . $return);
