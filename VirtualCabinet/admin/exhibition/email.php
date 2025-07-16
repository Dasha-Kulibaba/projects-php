<?php

require('../connect.php');

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
				<form action="../actions/mail.php" method="post">
					<input type="text" name="username" placeholder="Ім'я та прізвище">
					<input type="email" name="email" placeholder="пошта">
					<button type="submit" class="button_item">Далі</button>
				</form>
			</div>
		</div>
	</section>
</body>

</html>