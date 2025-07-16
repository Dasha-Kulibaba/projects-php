<?php

require('connect.php');

$month = date('m');
$prev_month = $month - 1;
$next_month = $month + 1;
$year = date("Y");

$query = "SELECT * FROM events WHERE YEAR(date)=$year AND   (MONTH(date) = $prev_month   || MONTH(date) = $month || MONTH(date) = $next_month)";
$result = mysqli_query($db, $query);

$events = [];
if ($result->num_rows > 0) {
	while ($item = mysqli_fetch_assoc($result)) {
		$events[] = $item;
	}
}

$query = "SELECT * FROM `weeks` WHERE `month` = $month AND `year`=$year ORDER BY `week_number`";
$result = mysqli_query($db, $query);
$weeks = [];
if ($result->num_rows > 0) {
	while ($item = mysqli_fetch_assoc($result)) {
		$weeks[] = $item;
	}
}

$query = "SELECT * FROM `psychology` WHERE `month` = $month AND `year`=$year";
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
