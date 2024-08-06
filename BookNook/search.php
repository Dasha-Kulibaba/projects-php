<?php
require_once('db.php');
if (isset($_SESSION['search'])) {
	$searchvalue = $_SESSION['search'];
}
$sql = "SELECT * FROM `genres`";
$query = mysqli_query($connect, $sql);
if (isset($_GET['genre'])) {
	$genre = $_GET['genre'];
	$countbook = "SELECT COUNT(book_title) AS `count` from books where book_title like '%$searchvalue%' and book__genres like '%$genre%'";
} else $countbook = "SELECT COUNT(book_title) AS `count` from books where book_title like '%$searchvalue%'";
$countbookquery = mysqli_query($connect, $countbook);
$countbookcheck = mysqli_fetch_array($countbookquery, MYSQLI_ASSOC);
$countauthor = "SELECT  COUNT( distinct authors.author_name) AS `count` FROM authors JOIN books ON authors.author_id = books.author_id and author_name like '%$searchvalue%'";
$countauthorquery = mysqli_query($connect, $countauthor);
$countauthorcheck = mysqli_fetch_array($countauthorquery, MYSQLI_ASSOC);
if (($countbookcheck['count'] == 0  && $countauthorcheck['count'] == 0) || $searchvalue == "") {
	header('Location:searchnoresult.php');
}
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
							<input type="search" name="search" value="<?php echo $searchvalue; ?>" placeholder="Пошук">
						</form>
					</div>
					<hr>
					<div class="books__content">
						<div class="books__result">
							<div class="book__sortgenre">
								<div class="books__genres-mob">
									Фентезі
								</div>
							</div>
							<?php
							if ($countbookcheck['count'] > 0) {
								echo '<div class="search__result-head">
								<div class="search__result">
									<p class="search__category">Книги</p>
									<p class="search__category-count">' . $countbookcheck['count'] . '</p>
								</div> 
								</div>';
								if (isset($_GET['genre'])) {
									$genre = $_GET['genre'];
									$search = "SELECT * FROM books,authors where  books.author_id=authors.author_id and book_title  like '%$searchvalue%' and book__genres like '%$genre%' ";
								} else $search = "SELECT * FROM books,authors where  books.author_id=authors.author_id and book_title  like '%$searchvalue%' ";
								$searchquery = mysqli_query($connect, $search);
								$b = 1;
								while ($res = mysqli_fetch_array($searchquery, MYSQLI_ASSOC)) {
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
										<a class="result__item-button" href="book__item.php?book=' . $res['book_id'] . '">читати</a>
									</div>
								</div>
												
													';
									if ($b != $countbookcheck['count']) {
										echo '<div class="lines">';
										for ($i = 0; $i < 100; $i++) {
											echo '<div class="line__item"></div>';
										}
										echo '</div>';
									}
									$b++;
								}
								unset($_GET['genre']);
							}
							if ($countauthorcheck['count'] > 0) {
								echo '<div class="search__result-head search__result-head-author">
									<div class="search__result">
										<p class="search__category">Автори</p>
										<p class="search__category-count">' . $countauthorcheck['count'] . '</p>
									</div>
								</div>';
								$search = "SELECT DISTINCT authors.* FROM authors JOIN books ON authors.author_id = books.author_id and author_name like '%$searchvalue%' ";
								$searchquery = mysqli_query($connect, $search);
								$searchcheck = mysqli_query($connect, $search);
								$check = mysqli_fetch_row($searchcheck);
								while ($author = mysqli_fetch_array($searchquery, MYSQLI_ASSOC)) {
									$fileurl = "img/authors/" . $author['author_id'] . ".jpg";
									if (!file_exists($fileurl)) continue;
									echo '<div  class="result__author">
									<a href="author__item.php?author=' . $author['author_id'] . '" class="author__image">
										<img src="img/authors/' . $author['author_id'] . '.jpg" alt="author">
									</a>
									<a href="author__item.php?author=' . $author['author_id'] . '" class="author__name">
									' . $author['author_name'] . '
									</a>
								</div>';
								}
							}
							?>


						</div>
						<aside class="books__genres">
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