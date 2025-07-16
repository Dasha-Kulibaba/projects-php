<?php
require('../connect.php');
CheckAdmin();
CheckEdit();
$query = "SELECT * FROM `courses` WHERE `id`=" . $_GET['id'];
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
					echo '
					<form action="../actions/editcourse.php" method="post">
			<input type="text" maxlength="230" name="title" required value="' . $item['title'] . '" placeholder="Назва">
			<input type="text" name="link" id="qualify" required value="' . $item['link'] . '" placeholder="Посилання">
			<select name="format">
				<option value="0"';
					if ($item['format'] === 0) echo 'selected';
					echo '>Онлайн</option>
				<option value="1"';
					if ($item['format'] === 1) echo 'selected';
					echo '>Офлайн</option>
			</select>
			<input type="date" name="date" value="' . $item['date'] . '">
			<input hidden type="number" name="id" value="' . $item['id'] . '">
			<button type="submit" class="button_item">Оновити</button>
		</form>
			';
				}
				?>

			</div>
		</div>
	</section>

</body>

</html>