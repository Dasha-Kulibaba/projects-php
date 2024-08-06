<?php
require_once('../db.php');
if (!$_SESSION['admin']) {
	header('location:../error.php');
	exit();
}
// if (isset($_SESSION['item']) && isset($_SESSION['name'])) {
// 	$getname = $_SESSION['name'];
// 	$_GET[$getname] = $_SESSION['item'];
// 	unset($_SESSION['item'], $_SESSION['name']);
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../css/zerostyle.css">
	<link rel="stylesheet" href="item.css">
	<link href="https://fonts.googleapis.com/css?family=Montserrat:regular,500,600,700&display=swap" rel="stylesheet">
	<title>Адмін панель</title>
</head>

<body>
	<div class="wrapper">
		<?php
		if (isset($_GET['new'])) {
			$item = $_GET['new'];
			switch ($item) {
				case "book": {
						$countsql = "SELECT max(book_id) from books ";
						$countquery = mysqli_query($connect, $countsql);
						$last = mysqli_fetch_row($countquery)[0] + 1;
						$sql = "SELECT * FROM authors";
						$query = mysqli_query($connect, $sql);
						echo '
								<form action="upitem.php" method="post" class="item" name="newbook" enctype="multipart/form-data">
								<div class="book__info">
									<label class="add__image">
										<input type="file" class="cover" name="cover" hidden="true">
										<img id="previewImage" src="#" alt="Натисніть, щоб завантажити зображення обкладинки">
									</label>
									<div class="book__data">
										<label for="title">Назва
											<input type="text" name="title">
										</label>
										<label for="orig_title">Назва в оригіналі
											<input type="text" name="orig_title">
										</label>
										<label for="year">Рік
											<input type="number" name="year" min="1901" max="2155">
										</label>
										<label for="">Автор
											<select name="author">
											<option name="author_item" value="" selected></option>';
						while ($res = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
							echo '<option value="' . $res['author_id'] . '" >' . $res['author_name'] . '</option>';
						}
						echo '
												
											</select>
										</label>
										<label class="cr-wrapper">
										<input type="checkbox" name="best">
															<div class="genre-input"></div>
														<span>Бестселлер</span>
													</label>
									</div>
									<div class="book__genres">Жанри';
						$sql = "SELECT * FROM genres";
						$query = mysqli_query($connect, $sql);
						$i = 1;
						while ($res = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
							echo '<label class="cr-wrapper">
										<input type="checkbox" name="genre' . $i . '" value="' . $res['genre_name'] . '">
										<div class="genre-input"></div>
										<span>' . $res['genre_name'] . '</span>
									</label>';
							$i++;
						}

						echo '
									</div>
								</div>
								<div class="book__descr">
									Опис
									<textarea name="book__descr" cols="200" rows="20"></textarea>
								</div>
								<button type="submit" name="newBook">Додати</button>
							</form> ';
					}
					break;
				case "author": {
						echo '<form action="upitem.php" class="author" name="newauthor" method="post" enctype="multipart/form-data">
								<label class="add__image add__image-author">
									<input type="file" class="cover" name="cover" hidden="true">
									<img id="previewImage" src="#" alt="Натисніть, щоб завантажити зображення обкладинки">
								</label>
								<div class="author__info">
									<label for="name">Ім’я Прізвище
										<input type="text" name="name">
									</label>
									<label for="origname">Ім’я Прізвище англійською
										<input type="text" name="origname">
									</label>
									<label for="year" class="year">Рік народження
										<input type="number" name="year" min="1901" max="2155">
									</label>
									<div class="place">
										<label for="city">Рідне місто
											<input type="text" name="city">
										</label>
										<label for="country">Країна
											<input type="text" name="country">
										</label>
									</div>
									<div class="author__descr">
										Про автора
										<textarea name="author__descr" cols="200" rows="20"></textarea>
									</div>
									<button type="submit" name="newAuthor">Додати</button>
								</div>
							</form>';
					}
					break;
			}
		} else if (isset($_GET['book'])) {
			$item = $_GET['book'];
			$author = "SELECT * FROM authors";
			$authorquery = mysqli_query($connect, $author);
			$sql = "SELECT * FROM books, authors where books.author_id=authors.author_id and book_id =$item";
			$query = mysqli_query($connect, $sql);
			$res = mysqli_fetch_array($query, MYSQLI_ASSOC);
			echo ' <form action="upitem.php" method="post" class="item" name="book" enctype="multipart/form-data">
									<div class="book__info">
										<label class="add__image">
											<input type="file" class="cover" name="cover" hidden="true">
											<img id="previewImage" src="../img/books/' . $item . '.jpeg" alt="Натисніть, щоб завантажити зображення обкладинки">
										</label>
										<div class="book__data">
										<input hidden type="text" value="' . $item . '" name="bookid">
											<label for="title">Назва
												<input type="text" name="title" value="' . $res['book_title'] . '">
											</label>
											<label for="orig_title">Назва в оригіналі
												<input type="text" name="orig_title" value="' . $res['book_orig'] . '">
											</label>
											<label for="year">Рік
												<input type="number" name="year" min="1901" max="2155" value="' . $res['book_year'] . '">
											</label>
											<label for="">Автор
												<select name="author">
													<option value="' . $res['author_id'] . '" selected>' . $res['author_name'] . '</option>';
			while ($authors = mysqli_fetch_array($authorquery, MYSQLI_ASSOC)) {
				if ($res['author_name'] == $authors['author_name']) continue;
				echo '<option  value="' . $authors['author_id'] . '" >' . $authors['author_name'] . '</option>';
			}
			echo '
												</select>
											</label>
											<label class="cr-wrapper">';
			if ($res['bestceller'] == 1) echo '<input type="checkbox" name="best" checked>';
			else echo '<input type="checkbox" name="best">';
			echo '<div class="genre-input"></div>
														<span>Бестселлер</span>
													</label>
										</div>
										<div class="book__genres">Жанри';
			$genres = "SELECT * FROM genres";
			$genquery = mysqli_query($connect, $genres);
			$i = 1;
			while ($resgen = mysqli_fetch_array($genquery, MYSQLI_ASSOC)) {
				echo '<label class="cr-wrapper">';
				if (stripos($res['book__genres'], $resgen['genre_name']) !== false) echo '<input type="checkbox" name="genre' . $i . '" value="' . $resgen['genre_name'] . '" checked>';
				else echo '<input type="checkbox" name="genre' . $i . '" value="' . $resgen['genre_name'] . '" >';
				echo '
														<div class="genre-input"></div>
														<span>' . $resgen['genre_name'] . '</span>
													</label>';
				$i++;
			}

			echo '
										</div>
									</div>
									<div class="book__descr">
										Опис
										<textarea name="book__descr" cols="200" rows="20">' . $res['book_descr'] . '</textarea>
									</div>
									<button type="submit" name="updateBook">Зберегти</button>
								</form> ';
		} else if (isset($_GET['author'])) {
			$item = $_GET['author'];
			$sql = "SELECT * FROM authors where author_id=$item";
			$query = mysqli_query($connect, $sql);
			$res = mysqli_fetch_array($query, MYSQLI_ASSOC);
			echo '<form action="upitem.php" class="author" name="author" method="post" enctype="multipart/form-data">
						<label class="add__image add__image-author">
							<input type="file" class="cover" name="cover" hidden="true">
							<img id="previewImage" src="../img/authors/' . $res['author_id'] . '.jpg" alt="Натисніть, щоб завантажити зображення обкладинки">
						</label>
						<div class="author__info">
							<input type="text" name="authorid" value="' . $item . '" hidden>
							<label for="name">Ім’я Прізвище
								<input type="text" name="name" value="' . $res['author_name'] . '">
							</label>
							<label for="origname">Ім’я Прізвище англійською
								<input type="text" name="origname" value="' . $res['author_orig_name'] . '">
							</label>
							<label for="year" class="year">Рік народження
								<input type="number" name="year" min="1901" max="2155" value="' . $res['author_birthday'] . '">
							</label>
							<div class="place">
								<label for="city">Рідне місто
									<input type="text" name="city" value="' . $res['author_city'] . '">
								</label>
								<label for="country">Країна
									<input type="text" name="country" value="' . $res['author_country'] . '">
								</label>
							</div>
							<div class="author__descr">
								Про автора
								<textarea name="author__descr" cols="200" rows="20" value="' . $res['author_descr'] . '">' . $res['author_descr'] . '</textarea>
							</div>
							<button type="submit" name="updateAuthor">Зберегти</button>
						</div>
					</form>';
		}
		?>
	</div>

	<script src="add.js"></script>
</body>

</html>