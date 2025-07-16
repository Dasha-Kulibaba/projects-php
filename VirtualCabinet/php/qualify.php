<?php
require('connect.php');

$query_1 = "SELECT `id`,`title`, `link`,`type`  FROM `documents` WHERE `section_id` = 3 ORDER BY `create_date`,`id` DESC";
$query_2 = "SELECT `id`,`title`, `link`, `format`, `date` FROM `courses`  ORDER BY `date`,`id` DESC";


$result = mysqli_query($db, $query_1);
$docs = [];
if ($result->num_rows > 0) {
	while ($item = mysqli_fetch_assoc($result)) {
		$docs[] = $item;
	}
}
$result = mysqli_query($db, $query_2);
$courses = [];
if ($result->num_rows > 0) {
	while ($item = mysqli_fetch_assoc($result)) {
		$courses[] = $item;
	}
}

$data = [
	"docs" => $docs,
	"courses" => $courses,
	"admin" => isAdmin()
];

mysqli_close($db);
echo json_encode($data);
