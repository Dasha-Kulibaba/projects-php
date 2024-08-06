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
	<link rel="stylesheet" href="css/books.css">
	<link rel="stylesheet" href="css/search.css">
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
		<main class="page ">
			<section class="page__search  search">
				<div class="search__container">
					<div class="search__head">
						<h1>Результати пошуку</h1>
						<form action="search.php" method="get" class="search__input">
							<input type="search" name="search" placeholder="Пошук">
						</form>
					</div>
					<hr>
					<div class="books__content">
						<div class="books__result">
							<div class="nores__title">
								<h2 class="nores__title-h2">На жаль, ми нічого не знайшли за вашим запитом. </h2>
								<h3 class="nores__title-h3">Спробуйте змінити ваш запит</h3>
							</div>
							<img src="img/SearchNoResult.svg" alt="NoResult" class="noresimage">
						</div>
						<aside class="books__genres books__genres-unactive ">
							<form action="search.php" method="get">
								<ul class="books__list">
									<?php
									$sql = "SELECT * from genres ";
									$res = mysqli_query($connect, $sql);
									while ($genre = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
										echo '<li class="books__list-item"><button type="submit" name="genre" value="' . $genre['genre_name'] . '">' . $genre['genre_name'] . '</button></li>';
									}
									?>
								</ul>
							</form>
						</aside>
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