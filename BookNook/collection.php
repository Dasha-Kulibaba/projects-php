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
	<link rel="stylesheet" href="css/collection.css">
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
					<form action="collection.php" method="get" class="books__head">
						<h2><button type="submit" name="collection" value="newbooks">Новинки</button></h2>
						<p>|</p>
						<h2><button name="collection" value="popular" type="submit">Популярні зараз</button> </h2>
						<p>|</p>
						<h2><button name="collection" value="best" type="submit">Бестселери</button> </h2>
					</form>
					<hr>
					<div class="books__collection">

						<div class="books__result">
							<?php
							if (isset($_GET['collection'])) {
								$collection = $_GET['collection'];
								switch ($collection) {
									case "newbooks": {
											$sqlcollection = "SELECT * FROM books,authors where books.author_id=authors.author_id order by book_year desc limit 0, 7";
											$colcount = 7;
										}
										break;
									case "popular": {
											$sqlcollection = "SELECT * FROM books,authors where books.author_id=authors.author_id order by book_views desc limit 0, 5";
											$colcount = 5;
										}
										break;
									case "best": {
											$sqlcollection = "SELECT * FROM books,authors where books.author_id=authors.author_id and bestceller=1 order by book_year desc limit 0,5";
											$colcount = 5;
										}
								}
							}
							$colquery = mysqli_query($connect, $sqlcollection);
							$c = 1;
							while ($res = mysqli_fetch_array($colquery, MYSQLI_ASSOC)) {
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
								if ($c != $colcount) {
									echo '<div class="lines">';
									for ($i = 0; $i < 150; $i++) {
										echo '<div class="line__item"></div>';
									}
									echo '</div>';
								}
								$c++;
							}

							?>

						</div>
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