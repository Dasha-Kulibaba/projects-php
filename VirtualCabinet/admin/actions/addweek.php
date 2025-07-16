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
	"create_date" => date("Y-m-d")
];


$insert = "INSERT INTO `weeks`(`title`, `month`, `year`, `week_number`, `create_date`) VALUES ('$data[title]','$data[month]',$data[year],$data[week_number],'$data[create_date]')";
mysqli_query($db, $insert);

$return = "../calendar/calendar.html";
header('location:' . $return);
exit();
