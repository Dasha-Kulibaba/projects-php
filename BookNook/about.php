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
		require("feedback.php");
		require("header.php");
		?>
		<main class="page">
			<section class="page__about about">
				<div class="about__container">
					<h1>Онлайн-бібліотека Book Nook</h1>
					<div class="about__content">
						<div class="about__text">
							<p>Любите читати? Запрошуємо до нашої української бібліотеки, де на вас чекає зустріч з вашими
								найкращими друзями – книжками, для вашого естетичного та інтелектуального задоволення.</p>
							<a href="books.php">Знайти книгу</a>
						</div>
						<img src="img/about.svg" alt="BookNook">
					</div>
				</div>
			</section>
		</main>
		<?php
		require("footer.php");
		?>
	</div>
	<script src="js/header.js"></script>

</body>

</html>