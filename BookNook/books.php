<?php
session_start();
require_once('db.php');
if (isset($_SESSION['genre'])) {
	$genre = $_SESSION['genre'];
}
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
			<section class="page__books ">
				<div class="books__container">

					<div class="books__content">
						<div class="books__result">
							<div class="books__head">
								<h1>Книги жанру <span><?php echo "$genre"; ?></span> </h1>
								<div class="books__sort">
									<p class="sort__main">
										<span>Сортувати</span>
										<img src="img/books/arrow.svg">
									</p>
									<form action="books.php" method="get" class="sort__extra">
										<button type="submit" name="sorta" class="extra__item">в алфавітному порядку (А-Я)</button>
										<button type="submit" name="sortb" class="extra__item">в зворотному порядку (Я-А)</button>
									</form>
								</div>
							</div>
							<hr>
							<div class="book__sortgenre">
								<div class="books__sort book__sort-mob" id="sortmob">
									<p class="sort__main">
										<span>Сортувати</span>
										<img src="img/books/arrow.svg">
									</p>
									<form action="books.php" method="get" class="sort__extra" id="sortmobform">
										<button type=" submit" name="sorta" class="extra__item">в алфавітному порядку (А-Я)</button>
										<button type="submit" name="sortb" class="extra__item">в зворотному порядку (Я-А)</button>
									</form>
								</div>
								<div class="books__genres-mob" id="mobgenre">
									Фентезі
								</div>
							</div>
							<?php
							if (isset($_GET['sorta'])) $book =  "SELECT * FROM books, authors where books.author_id=authors.author_id and book__genres like '%$genre%' order by book_title";
							else if (isset($_GET['sortb'])) $book =  "SELECT * FROM books, authors where books.author_id=authors.author_id and book__genres like '%$genre%' order by book_title desc";
							else $book =  "SELECT * FROM books, authors where books.author_id=authors.author_id and book__genres like '%$genre%'";
							$countbook = "SELECT count(book_title) as `count` FROM books, authors where books.author_id=authors.author_id and book__genres like '%$genre%'";
							$bcount = mysqli_query($connect, $countbook);
							$bcount = mysqli_fetch_array($bcount, MYSQLI_ASSOC);
							$bcount = $bcount['count'];
							$result = mysqli_query($connect, $book);
							$b = 1;
							while ($res = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
								echo '
								<div class="result__item" action="book__item.php">
								<a href="book__item.php?book=' . $res['book_id'] . '" class="result__item-cover">
									<img src="img/books/' . $res['book_id'] . '.jpeg" alt="' . $res['book_title'] . '">
								</a>
								<div class="result__item-context">
									<h4><a href=" book__item.php?book=' . $res['book_id'] . '">' . $res['book_title'] . '</a></h4>
									<h5><a href="author__item.php?author=' . $res['author_id'] . '">' . $res['author_name'] . '</a></h5>
									<p class="descr">' . $res['book_descr'] . '
									</p>
									<a class="result__item-button" href="book__item.php?book=' . $res['book_id'] . '">Детальніше</a>
								</div>
							</div>
							
								';
								if ($b != $bcount) {
									echo '<div class="lines">';
									for ($i = 0; $i < 100; $i++) {
										echo '<div class="line__item"></div>';
									}
									echo '</div>';
								}
								$b++;
							}
							unset($_GET['sorta'], $_GET['sortb']);
							?>
						</div>

						<aside class="books__genres">
							<form action="books.php" method="get">
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
	<script src="js/sort.js"></script>
	<script src="js/header.js"></script>
</body>

</html>