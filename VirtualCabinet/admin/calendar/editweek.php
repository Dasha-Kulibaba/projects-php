<?php

require('../connect.php');
CheckAdmin();
CheckEdit();
$query = "SELECT * FROM `weeks` WHERE `id`=" . $_GET['id'];
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
				<form action="../actions/editweek.php" method="post">
		<input type="text" maxlength="230" required name="title" value="' . $item['title'] . '" placeholder="Назва">
		<input type="number" name="week_number" min="1" max="5" value="' . $item['week_number'] . '">
		<input type="month" name="month" value="' . $item['year'] . '-' . $item['month'] . '">
		<input type="number" name="id" value="' . $item['id'] . '" hidden>
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