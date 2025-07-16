<?php
require('../connect.php');
CheckAdmin();
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
				<form action="../actions/addcourse.php" method="post">
					<input type="text" maxlength="230" name="title" required placeholder="Назва">
					<input type="text" name="link" id="qualify" required placeholder="Посилання">
					<select name="format">
						<option value="0">Онлайн</option>
						<option value="1">Офлайн</option>
					</select>
					<input type="date" name="date">
					<button type="submit" class="button_item">Додати</button>
				</form>
			</div>
		</div>
	</section>

</body>

</html>