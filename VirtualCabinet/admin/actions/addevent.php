<?php

require('../connect.php');
CheckAdmin();
CheckData();

$data = [
	"name" => mysqli_real_escape_string($db, $_POST['name']),
	"date" => $_POST['date'],
	"time" => $_POST['time'],
	"frequency" => $_POST['frequency'],
	"create_date" => date("Y-m-d")
];


$insert = "INSERT INTO `events`(`name`, `date`, `frequency`, `time`, `create_date`) VALUES ('$data[name]','$data[date]',$data[frequency],'$data[time]','$data[create_date]')";
mysqli_query($db, $insert);

$return = "../calendar/calendar.html";
header('location:' . $return);
exit();
