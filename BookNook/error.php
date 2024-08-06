<?php
require_once('db.php');
$sql = "SELECT * FROM `genres`";
$query = mysqli_query($connect, $sql);
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/zerostyle.css">
	<link rel="stylesheet" href="css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Montserrat:regular,500,600,700&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Monoton:&display=swap" rel="stylesheet">
	<title>BookNook</title>
</head>

<body>
	<div class="wrapper">
		<?php
		require("header.php");
		?>
		<main class="page">
			<section class="page__error error">
				<div class="error__container">
					<div class="error__content">
						<h1>Отакої! Нам не вдалось знайти такої сторінки. Команда вже працює над вирішенням проблеми.</h1>
						<a href="index.php" class="error__link">На головну</a>
						<img src="img/error404.svg" alt="404">
					</div>

				</div>
			</section>
		</main>

	</div>
	<script src="js/header.js"></script>

</body>

</html>