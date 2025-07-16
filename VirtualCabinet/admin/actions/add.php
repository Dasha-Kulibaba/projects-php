<?php
require('../connect.php');

CheckData();


$filename = preg_replace('/[^a-zA-Zа-яА-ЯїЇєЄіІ0-9]/u', '', $_POST['title']);
$filename = str_replace(' ', '_', $_POST['title']);


if (isset($_FILES["file"]) && $_FILES["file"]["size"] > 0) {
	$fileExt = pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);

	$file = 'public/' . $sections[$_POST['section_id']] . '/' . $filename . "_" . uniqid() . "." . $fileExt;
	move_uploaded_file($_FILES["file"]["tmp_name"], dirname(__DIR__) . '\\' . $file);
	unset($_FILES["file"]);
} else {
	if (isset($_POST['link'])) {
		$file = $_POST['link'];
	}
}


$data = [
	"title" => mysqli_real_escape_string($db, $_POST['title']),
	"file" => $file,
	"type" => null,
	"years" =>  NULL,
	"author_id" => NULL,
	"section_id" => $_POST['section_id'],
	"create_date" => date("Y-m-d"),
];


if (isset($_POST['years'])) {
	$data['years'] = $_POST["years"];
}

if (isset($_POST['author_id'])) {
	$data['author_id'] = $_POST['author_id'];
}

if (isset($_POST['type'])) {
	$data['type'] = $_POST['type'];
}

$years = is_null($data['years']) ? "NULL" : "'{$data['years']}'";
$author = is_null($data['author_id']) ? "NULL" : $data['author_id'];
$type = is_null($data['type']) ? "NULL" : "'{$_POST['type']}'";


$insert = "INSERT INTO `documents`( `title`, `link`, `type`, `author_id`, `years`, `section_id`, `create_date`) VALUES ('$data[title]','$data[file]',$type, $author,  $years ,$data[section_id],'$data[create_date]')";

mysqli_query($db, $insert);

unset($_POST['title'], $_SESSION['email']);


$return = "../../index.php";
header('location:' . $return);
