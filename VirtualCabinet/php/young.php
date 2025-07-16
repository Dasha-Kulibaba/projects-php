<?php
require('connect.php');

$query_1 = "SELECT `id`,`title`, `link`,`type`  FROM `documents` WHERE `section_id` = 1 ORDER BY  `create_date`,`upd_date`,`id` DESC";


$result = mysqli_query($db, $query_1);
$docs = [];
if ($result->num_rows > 0) {
	while ($item = mysqli_fetch_assoc($result)) {
		$docs[] = $item;
	}
}


$data = [
	"docs" => $docs,
	"admin" => isAdmin()
];

mysqli_close($db);
echo json_encode($data);
