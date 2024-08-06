<?php
require_once('db.php');
// if (isset($_SESSION['author'])) {
$author = $_SESSION['author'];

$sqlauthor = "	SELECT * FROM authors where author_id=$author";
$aquery = mysqli_query($connect, $sqlauthor);
$author_item = mysqli_fetch_array($aquery, MYSQLI_ASSOC);
$fileurl = "img/authors/" . $author_item['author_id'] . ".jpg";
if (!file_exists($fileurl)) header('location:error.php');
$sql = "SELECT * FROM `genres`";
$query = mysqli_query($connect, $sql);
if ($author_item['author_descr'] == NULL) header('location: error.php');

?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/zerostyle.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/item.css">
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
			<section class="page__author author">
				<div class="author__container">
					<div class="author__content">

						<div class="author__image">
							<?php
							echo '<img src="img/authors/' . $author_item['author_id'] . '.jpg" alt="author">';
							?>

						</div>
						<div class="author__about">
							<div class="author__name">
								<h1><?php echo $author_item['author_name']; ?> </h1>
								<?php
								if ($author_item['author_orig_name'] != NULL) {
									echo '<h2>' . $author_item['author_orig_name'] . '</h2>';
								}
								?>

							</div>
							<div class="author__data">
								<div class="author__birth">
									<p>Рік народження:</p>
									<p><?php echo $author_item['author_birthday']; ?></p>
								</div>
								<div class="author__place">
									<p>Місце народження:</p>
									<p><?php echo $author_item['author_city']; ?>, <?php echo $author_item['author_country']; ?></p>
								</div>
							</div>
							<div class="author__bio">
								<?php
								echo $author_item['author_descr'];
								?>

							</div>
						</div>
					</div>
				</div>
			</section>
			<section class="page__writing writing">
				<div class="writing__container">
					<div class="books__head">
						<h1>Книги автора</h1>
						<div class="books__sort books__sort-author">
							<p class="sort__main">
								<span>Сортувати</span>
								<img src="img/books/arrow.svg">
							</p>
							<form action="author__item.php" method="get" class="sort__extra">
								<button type="submit" name="sorta" class="extra__item">в алфавітному порядку (А-Я)</button>
								<button type="submit" name="sortb" class="extra__item">в зворотному порядку (Я-А)</button>
							</form>
						</div>
					</div>
					<hr>
					<div class="writing__items books">
						<?php
						if (isset($_GET['sorta'])) $aubook = " SELECT * FROM books, authors where books.author_id=authors.author_id and books.author_id=$author order by book_title";
						else if (isset($_GET['sortb'])) $aubook = " SELECT * FROM books, authors where books.author_id=authors.author_id and books.author_id=$author order by book_title desc";
						else $aubook = " SELECT * FROM books, authors where books.author_id=authors.author_id and books.author_id=$author";
						$abquery = mysqli_query($connect, $aubook);
						while ($book = mysqli_fetch_array($abquery, MYSQLI_ASSOC)) {
							echo '
							<div class="books__item">
							<a href="book__item.php?book=' . $book['book_id'] . '" class="books__cover"">
							<img src="img/books/' . $book['book_id'] . '.jpeg" alt="' . $book['book_title'] . '">
							</a>
							<a class="books__author" href="author__item.php?author=' . $book['author_id'] . '">' . $book['author_name'] . '</a>
							<a class="books__tittle" href="book__item.php?book=' . $book['book_id'] . '">' . $book['book_title'] . '</a>
					</div>
							';
						}
						unset($_GET['sorta'], $_GET['sortb']);
						echo "</div>";

						if (mysqli_num_rows($abquery) > 7) echo '<div class="writing__more">Показати всі</div>';

						?>
					</div>
			</section>
		</main>
		<?php
		require("footer.php");
		?>
	</div>
	<script src="js/header.js"></script>
	<script src="js/script.js"></script>
	<script src="js/books-more.js"></script>
	<script src="js/sort.js"></script>
</body>

</html>