<?php
require('connect.php');

$query_1 = "SELECT documents.id,documents.title, documents.link, users.name,documents.create_date  FROM `documents`   JOIN `users` ON documents.author_id=users.id WHERE documents.section_id = 4 ORDER BY  documents.create_date,documents.upd_date,documents.id DESC";


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
