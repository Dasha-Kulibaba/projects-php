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




$insert = "INSERT INTO `courses`(`title`, `link`, `format`, `date`, `create_date`) VALUES ('$data[title]','$data[link]',$data[format],$data[date],'$data[create_date]')";

mysqli_query($db, $insert);



$return = "../../html/qual.php";
header('location:' . $return);
