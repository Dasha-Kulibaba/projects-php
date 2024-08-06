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
	<link rel="stylesheet" href="css/authors.css">
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
			<section class="page__authors authors">
				<div class="authors__container">
					<form action="authors.php" method="get" class="authors__search">
						<input type="search" name="authors" placeholder="Пошук серед авторів">
						<button type="submit" hidden name="submitau"></button>
					</form>
					<div class="authors__grid">
						<?php
						if (isset($_GET['submitau'])) {
							$search = $_GET['authors'];
							$author = "SELECT * FROM authors where author_name like '%$search%'";
						} else $author = "SELECT DISTINCT authors.* FROM authors JOIN books ON authors.author_id = books.author_id;";
						$result = mysqli_query($connect, $author);
						while ($res = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
							$fileurl = "img/authors/" . $res['author_id'] . ".jpg";
							if (!file_exists($fileurl)) continue;
							echo '
							<div class="author__item" >
							<a href="author__item.php?author' . $res['author_id'] . '"  class="author__image">
								<img src="img/authors/' . $res['author_id'] . '.jpg" alt="author">
							</a>
							<a  href="author__item.php?author=' . $res['author_id'] . '" class="author__name">
								' . $res['author_name'] . '
							</a>
						</div>
							';
						}
						unset($_GET['authors']);
						unset($_GET['submitau']);
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

</body>

</html>