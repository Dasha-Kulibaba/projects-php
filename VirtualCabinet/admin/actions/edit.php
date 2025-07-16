<?php
require('../connect.php');
CheckData();





$query = "SELECT `id`, `title`, `link` FROM `documents` WHERE `id`=" . $_POST['id'];
$item = mysqli_fetch_row(mysqli_query($db, $query));



$data = [
	"title" => mysqli_real_escape_string($db, $_POST['title']),
	"file" => $item[2],
	"type" => NULL,
	"years" =>  NULL,
	"author_id" => NULL,
	"section_id" => $_POST['section_id'],
	"upd_date" => date("Y-m-d"),
];


if (isset($_FILES["file"]) && $_FILES["file"]["size"] > 0) {
	if (file_exists(dirname(__DIR__) . '\\' . $item[2])) {
		unlink(dirname(__DIR__) . '\\' . $item[2]);
	}
	$filename = preg_replace('/[^a-zA-Zа-яА-ЯїЇєЄіІ0-9]/u', '', $_POST['title']);
	$filename = str_replace(' ', '_', $_POST['title']);
	$fileExt = pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);
	$file = 'public/' . $sections[$_POST['section_id']] . '/' . $filename . "_" . uniqid() . "." . $fileExt;
	move_uploaded_file($_FILES["file"]["tmp_name"], dirname(__DIR__) . '\\' . $file);
	$data['file'] = $file;
	unset($_FILES["file"]);
}


if (isset($_POST['years'])) {
	$data['years'] = $_POST['years'];
}

if (isset($_POST['author_id'])) {
	$data['author_id'] = $_POST['author_id'];
}

$years = is_null($data['years']) ? "NULL" : "'{$data['years']}'";
$author = is_null($data['author_id']) ? "NULL" : $data['author_id'];
$type = is_null($_POST['type']) ? "NULL" : "'{$_POST['type']}'";

$update = "UPDATE `documents` SET `title`='$data[title]',`link`='$data[file]',`type`=$type,`author_id`=$author,`years`=$years,`section_id`=$data[section_id],`upd_date`='$data[upd_date]' WHERE `id`=" . $_POST['id'];

mysqli_query($db, $update);
unset($_POST['title']);

$return = "../../index.php";
header('location:' . $return);
exit();
