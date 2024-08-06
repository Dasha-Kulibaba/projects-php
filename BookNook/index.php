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
			<section class="page__main main">
				<div class="main__container">
					<div class="main__genres genres">
						<a href="books.php?genre=Фентезі" class="genre__item">
							<p>Фентезі</p>
							<img src="img/fentesi.jpg" alt="Фентезі">
						</a>
						<a href="books.php?genre=Фантастика" class="genre__item">
							<p>фантастика</p> <img src="img/fantastic.jpg" alt="Фантастика">
						</a>
						<a href="books.php?genre=Драма" class="genre__item">
							<p>драма</p> <img src="img/drama.jpg" alt="Драма">
						</a>
						<a href="books.php?genre=Класика" class="genre__item">
							<p>класика</p> <img src="img/classic.jpg" alt="Класика">
						</a>
						<a href="books.php?genre=Детективи" class="genre__item">
							<p>детективи</p> <img src="img/detective.jpg" alt="Детективи">
						</a>
						<div class="genre__item genre__main">
							<p> <span>Book</span> <span> Nook</span></p>
							<img src="img/main.png" alt="Book Nook">
						</div>

					</div>
			</section>
			<section class="page__popular popular">
				<div class="popular__container">
					<h3 class="popular__tittle">ТОП у різних жанрах</h3>
					<div class="popular__books books">
						<?php
						$sql = "SELECT * from `books`, `authors` where books.author_id=authors.author_id and bestceller=1 order by book_year desc limit 0,15";
						$res = mysqli_query($connect, $sql);
						while ($book = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
							echo '
					<div class="books__item">
						<a href="book__item.php?book=' . $book['book_id'] . '" class="books__cover"">
							<img src="img/books/' . $book['book_id'] . '.jpeg" alt="' . $book['book_title'] . '">
						</a>
						<a href="author__item.php?author=' . $book['author_id'] . '" class="books__author">' . $book['author_name'] . '</a>
						<a href="book__item.php?book=' . $book['book_id'] . '" class="books__tittle">' . $book['book_title'] . '</a>
					</div>
					';
						}
						?>
					</div>
				</div>
			</section>
		</main>
		<?php
		require("footer.php");
		?>
	</div>
	<script src="js/header.js"></script>
	<script src="js/script.js"></script>
</body>

</html>