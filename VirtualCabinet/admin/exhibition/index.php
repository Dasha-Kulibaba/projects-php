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
				<div class="autorize__buttons">
					<?php
					if (!isset($_SESSION['email'])) {
						echo '					<a href="email.php" class="button__item">Створити</a>
					<a href="email.php" class="button__item">Редагувати</a>';
					} else {
						echo '					<a href="create.php" class="button__item">Створити</a>
					<a href="editcatalog.php" class="button__item">Редагувати</a>';
					}
					?>

					<?php
					if (isset($_SESSION['admin'])) {
						echo '<a href="admineditcatalog.php" class="button__item">Редагувати(адмінка)</a>';
					}
					?>
					<a href="../../index.php" class="button__item">На головну</a>
				</div>
			</div>
		</div>
	</section>
</body>

</html>