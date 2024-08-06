<?php
require('../db.php');
if (!$_SESSION['admin']) {
	header('location:../error.php');
	exit();
}
if (isset($_GET['books'])) $type = "book";
else $type = "author";
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../css/zerostyle.css">
	<link rel="stylesheet" href="catalog.css">
	<link href="https://fonts.googleapis.com/css?family=Montserrat:regular,500,600,700&display=swap" rel="stylesheet">
	<title>Адмін панель</title>
</head>

<body>
	<div class="wrapper">
		<header class="header">
			<form action="admin__catalog.php" method="get">
				<button type="submit" name="books">Книги </button>
				<button type="submit" name="authors">Автори</button>
			</form>
			<form action="admin__item.php" method="get">
				<a href="exit.php" class="admin__exit">exit</a>
				<button type="submit" name="new" value="<?php echo $type; ?>">+</button>
			</form>
		</header>
		<main class="main">
			<?php
			if (isset($_GET['books'])) {
				echo '<form action="admin__item.php" method="get" class="books">';
				$sql = "SELECT * FROM books";
				$query = mysqli_query($connect, $sql);
				while ($res = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
					echo '<div class="book__item">
						<button type="submit" name="book" value="' . $res['book_id'] . '" class="book__cover">
					<img src="../img/books/' . $res['book_id'] . '.jpeg" alt="">
				</button>
				<button type="submit" name="book" value="' . $res['book_id'] . '" class="book__title">' . $res['book_title'] . '</button>
				</div>';
				}
				echo '</form>';
				unset($_GET['books']);
			} else if (isset($_GET['authors'])) {
				echo '<form action="admin__item.php" method="get" class="authors__grid">';
				$sql = "SELECT * FROM authors";
				$query = mysqli_query($connect, $sql);
				while ($res = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
					echo '<div class="author__item">
						<button type="submit" name="author" value="' . $res['author_id'] . '" class="author__image">
						<img src="../img/authors/' . $res['author_id'] . '.jpg" alt="author">
					</button>
					<button type="submit" name="author" value="' . $res['author_id'] . '" class="author__name">
						' . $res['author_name'] . '
					</button></div>';
				}
				echo '</form>';
				unset($_GET['authors']);
			}
			?>


		</main>
	</div>

</body>

</html>