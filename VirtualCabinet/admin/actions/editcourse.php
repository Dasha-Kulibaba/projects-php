<?php
require('../connect.php');

CheckAdmin();
CheckData();



$data = [
	"title" => mysqli_real_escape_string($db, $_POST['title']),
	"link" => $_POST['link'],
	"format" => $_POST['format'],
	"create_date" => date("Y-m-d"),
];


$data['date'] = isset($_POST['date']) ? "'{$_POST['date']}'" : "NULL";




$update = "UPDATE `courses` SET `title`='$data[title]',`link`='$data[link]',`format`=$data[format],`date`=$data[date],`upd_date`='$data[create_date]' WHERE `id`=" . $_POST['id'];
mysqli_query($db, $update);



$return = "../../html/qual.php";
header('location:' . $return);
