<?php
require_once('db.php');
$book = $_GET['book'];
$sqlbook = "	SELECT * FROM books, authors where books.author_id=authors.author_id and books.book_id=$book ";
$bookquery = mysqli_query($connect, $sqlbook);
$sql = "SELECT * FROM `genres`";
$query = mysqli_query($connect, $sql);
mysqli_begin_transaction($connect);
$view = "UPDATE books SET book_views=book_views+1 WHERE book_id=$book";
mysqli_query($connect, $view);
mysqli_commit($connect);
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
			<section class="page__book book">
				<div class="book__container">
					<?php
					$res = mysqli_fetch_array($bookquery, MYSQLI_ASSOC);
					echo '<h1 class="book__title">' . $res['book_title'] . '</h1>';
					?>
					<div class="book__main">
						<div class="book__cover">
							<img src="img/books/<?php echo $res['book_id']; ?>.jpeg" alt="<?php $res['book_title'] ?>">
						</div>
						<div class="book__about">
							<div class="book__name">
								<h1><?php
										echo $res['book_title'];
										?>
								</h1>
								<h2><?php
										echo $res['book_orig'];
										?></h2>
							</div>
							<div class="book__data">
								<div class="book__genres">
									<p>Жанри:</p>
									<?php
									$bookgenres = $res['book__genres'];
									$genre = explode(",", $bookgenres);
									?>
									<p>
										<?php
										if (count($genre) > 1) {
											for ($i = 0; $i < count($genre); $i++) {
												echo '<a href="books.php?genre=' . $genre[$i] . '">' . $genre[$i] . '</a>';
												if ($i != count($genre)) echo '<span>, </span>';
											}
										} else echo '<a href="books.php?genre=' . $genre[0] . '">' . $genre[0] . '</a>';
										?>
									</p>

								</div>
								<div class="book__year">
									<p>Рік:</p>
									<p><?php
										echo $res['book_year'];
										?></p>
								</div>
								<div class="book__author">
									<p>Автор:</p>
									<a href="author__item.php?author=<?php echo $res['author_id']; ?> ">
										<?php echo $res['author_name']; ?>
									</a>
								</div>
							</div>
						</div>
					</div>
					<div class="book__description">
						<p><?php echo $res['book_descr'] ?></p>
					</div>
				</div>
			</section>
		</main>
		<?php
		require("footer.php");
		?>
	</div>
	<script src="js/header.js"></script>
	<script src="js/books-more.js"></script>
</body>

</html>