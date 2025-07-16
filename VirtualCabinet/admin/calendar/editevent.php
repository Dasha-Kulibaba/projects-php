<?php

require('../connect.php');
CheckAdmin();
CheckEdit();
$query = "SELECT * FROM `events` WHERE `id`=" . $_GET['id'];
$res = mysqli_query($db, $query);
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="../../styles/styles.css" />

</head>

<body>
	<section class="autorize">
		<div class="container autorize__container ">
			<div class="autorize__content">
				<?php
				if ($res->num_rows > 0) {
					$item = mysqli_fetch_assoc($res);
					echo '		<form action="../actions/editevent.php" method="post">
			<input type="date" name="date" required value="' . $item['date'] . '">
			<input type="time" name="time" required value="' . $item['time'] . '">
			<input type="text"  maxlength="230" name="name" required value="' . $item['name'] . '" placeholder="Опис події">
			<select name="frequency" required>';
					for ($i = 1; $i < count($event_frequency); $i++) {
						echo '<option value="' . $i . '"';
						if ($i == $item['frequency']) echo 'selected ';
						echo '>' . $event_frequency[$i] . '</option>';
					}
					echo '
			</select>
			<input hidden type="number" value="' . $item['id'] . '" name="id">
			<button type="submit" class="button_item">Оновити</button>
		</form>';
				}
				?>

			</div>
		</div>
	</section>
</body>

</html>