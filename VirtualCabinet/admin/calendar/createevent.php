<?php

require('../connect.php');
CheckAdmin();

$event_date = $_GET['date'] ? $_GET['date'] : "";
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
				<form action="../actions/addevent.php" method="post">
					<input type="date" name="date" required value="<?php echo ($event_date) ?>">
					<input type="time" name="time" required>
					<input type="text" maxlength="230" name="name" required placeholder="Опис події">
					<select name="frequency" required>
						<?php
						for ($i = 1; $i < count($event_frequency); $i++) {
							echo '<option value="' . $i . '">' . $event_frequency[$i] . '</option>';
						}
						?>
					</select>
					<button type="submit" class="button_item">Додати</button>
				</form>
			</div>
		</div>
	</section>
</body>

</html>