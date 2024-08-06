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
			<section class="page__copyright copyright">
				<div class="copyright__container">
					<div class="copyright__content">
						<h1>Авторське право</h1>
						<p class="copyright__text">Інтернет-каталог “Book Nook” пропонує відвідувачам сайту твори, що
							викладені у вільному доступі в
							мережі Інтернет. Усі матеріали розміщено виключно у ознайомчих цілях і не можуть використовуватись
							у комерційних цілях.</p>
						<p class="copyright__text">
							У разі виявлення порушення авторського права, матеріал повністю вилучається з сайту.У разі
							виявлення порушення авторського права, матеріал повністю вилучається з сайту.
						</p>
						<p class="copyright__text">
							Якщо Ви є автором і хочете розмістити свій твір на сайті, будь ласка, напишіть у форму зворотнього
							зв’язку.
						</p>

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