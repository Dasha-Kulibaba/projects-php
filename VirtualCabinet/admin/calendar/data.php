<?php

$db = mysqli_connect('localhost', 'root', "", 'vmfk');

$month = date('m');
$year = date("Y");

$query = "SELECT * FROM events";
$result = mysqli_query($db, $query);

$events = [];
if ($result->num_rows > 0) {
	while ($item = mysqli_fetch_assoc($result)) {
		$events[] = $item;
	}
}

$query = "SELECT * FROM `weeks`  ORDER BY `week_number`";
$result = mysqli_query($db, $query);
$weeks = [];
if ($result->num_rows > 0) {
	while ($item = mysqli_fetch_assoc($result)) {
		$weeks[] = $item;
	}
}

$query = "SELECT * FROM `psychology`";
$result = mysqli_query($db, $query);
$psych = [];
if ($result->num_rows > 0) {
	while ($item = mysqli_fetch_assoc($result)) {
		$psych[] = $item;
	}
}

$data = [
	'events' => $events,
	'weeks' => $weeks,
	'psych' => $psych
];

mysqli_close($db);
echo json_encode($data);
