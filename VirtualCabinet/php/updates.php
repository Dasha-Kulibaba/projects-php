<?php
require('connect.php');

$query_1 = "SELECT `title`, `create_date`, `section_id` FROM `documents` WHERE `upd_date` IS NULL ORDER BY `id` DESC LIMIT 5";
$query_2 = "SELECT `title`, `create_date` FROM `courses` WHERE `upd_date` IS NULL ORDER BY `id` DESC LIMIT 5";


$result = mysqli_query($db, $query_1);
$doc_create = [];
if ($result->num_rows > 0) {
	while ($item = mysqli_fetch_assoc($result)) {
		$doc_create[] = $item;
	}
}

$result = mysqli_query($db, $query_2);
$course_create = [];
if ($result->num_rows > 0) {
	while ($item = mysqli_fetch_assoc($result)) {
		$course_create[] = $item;
	}
}

$query_1 = "SELECT `title`, `upd_date`, `section_id` FROM `documents`WHERE `upd_date` IS NOT NULL  ORDER BY  `upd_date`, `id` DESC LIMIT 5";
$query_2 = "SELECT `title`, `upd_date` FROM `courses` WHERE `upd_date` IS NOT NULL  ORDER BY `upd_date`,`id` DESC LIMIT 5";


$result = mysqli_query($db, $query_1);
$doc_upd = [];
if ($result->num_rows > 0) {
	while ($item = mysqli_fetch_assoc($result)) {
		$doc_upd[] = $item;
	}
}

$result = mysqli_query($db, $query_2);
$course_upd = [];
if ($result->num_rows > 0) {
	while ($item = mysqli_fetch_assoc($result)) {
		$course_upd[] = $item;
	}
}

$data = [
	"create" => [
		"doc" => $doc_create,
		"course" => $course_create
	],
	"update" => [
		"doc" => $doc_upd,
		"course" => $course_upd
	]

];
mysqli_close($db);
echo json_encode($data);
