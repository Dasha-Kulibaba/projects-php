<?php
require_once('../db.php');





if (isset($_POST['newBook'])) {
	$countsql = "SELECT max(book_id) from books ";
	$countquery = mysqli_query($connect, $countsql);
	$last = mysqli_fetch_row($countquery)[0] + 1;
	if (isset($_FILES['cover'])) {
		$file = $_FILES['cover'];
		if ($file['error'] === UPLOAD_ERR_OK) {
			$original_name = basename($file['name']);
			$new_name = (string)$last . '.jpeg';
			$target_directory = '../img/books/';
			$target_path = $target_directory . $new_name;
			move_uploaded_file($file['tmp_name'], $target_path);
		}
	}
	$title = mysqli_real_escape_string($connect, $_POST['title']);
	$origtitle = mysqli_real_escape_string($connect, $_POST['orig_title']);
	$year =  $_POST['year'];
	$genres = "";
	$g = 0;
	for ($i = 1; $i <= 8; $i++) {
		if (isset($_POST['genre' . $i])) {
			if ($g > 0) {
				$genres .= ", " . $_POST['genre' . $i];
			} else {
				$genres .= $_POST['genre' . $i];
			}
			$g++;
		}
	}
	$author = $_POST['author'];
	if (isset($_POST['best'])) $best = 1;
	else $best = 0;
	$descr = mysqli_real_escape_string($connect, $_POST['book__descr']);
	if (empty($title) || empty($year) || empty($genres) || empty($author) || empty($descr)) {
		header('location:admin__item.php?new=book');
	}
	$sql = "INSERT INTO `books`(`book_id`, `book_title`, `book_orig`, `book__genres`, `author_id`, `book_year`, `book_descr`, `book_views`, `bestceller`) VALUES ('$last','$title','$origtitle','$genres','$author','$year','$descr',0,'$best')";
	$res = mysqli_query($connect, $sql);
	if ($res) {
		unset($_POST['newBook']);
		header('location:admin__catalog.php');
	} else {
		echo  mysqli_error($connect);
	}
}
if (isset($_POST['newAuthor'])) {
	$countsql = "SELECT max(author_id) from authors ";
	$countquery = mysqli_query($connect, $countsql);
	$last = mysqli_fetch_row($countquery)[0] + 1;
	if (isset($_FILES['cover'])) {
		$file = $_FILES['cover'];
		if ($file['error'] === UPLOAD_ERR_OK) {
			$original_name = basename($file['name']);
			$new_name = (string)$last . '.jpg';
			$target_directory = '../img/authors/';
			$target_path = $target_directory . $new_name;
			move_uploaded_file($file['tmp_name'], $target_path);
		}
	}
	$name = mysqli_real_escape_string($connect, $_POST['name']);
	$origname = mysqli_real_escape_string($connect, $_POST['origname']);
	$year = mysqli_real_escape_string($connect, $_POST['year']);
	$city = mysqli_real_escape_string($connect, $_POST['city']);
	$country = mysqli_real_escape_string($connect, $_POST['country']);
	$descr = mysqli_real_escape_string($connect, $_POST['author__descr']);
	if (empty($name) || empty($year) || empty($city) || empty($country) || empty($descr)) {
		header('location:admin__item.php?new=author');
	}
	$sql = "INSERT INTO `authors`(`author_id`, `author_name`, `author_orig_name`, `author_city`, `author_country`, `author_birthday`, `author_descr`) 
	VALUES ('$last','$name','$origname','$city','$country','$year','$descr')";
	$res = mysqli_query($connect, $sql);
	if ($res) {
		unset($_POST['newAuthor']);
		header('location:admin__catalog.php');
	} else {
		echo  mysqli_error($connect);
	}
}

if (isset($_POST['updateBook'])) {
	$item = $_POST['bookid'];
	if (isset($_FILES['cover'])) {
		$file = $_FILES['cover'];
		if ($file['error'] === UPLOAD_ERR_OK) {
			$original_name = basename($file['name']);
			$new_name = (string)$item  . '.jpeg';
			$target_directory = '../img/books/';
			$target_path = $target_directory . $new_name;
			move_uploaded_file($file['tmp_name'], $target_path);
		}
	}

	$title = mysqli_real_escape_string($connect, $_POST['title']);
	$origtitle = mysqli_real_escape_string($connect, $_POST['orig_title']);
	$year = mysqli_real_escape_string($connect, $_POST['year']);
	$genres = "";
	$g = 0;
	for ($i = 1; $i <= 8; $i++) {
		if (isset($_POST['genre' . $i])) {
			if ($g > 0) {
				$genres .= ", " . $_POST['genre' . $i];
			} else {
				$genres .= $_POST['genre' . $i];
			}
			$g++;
		}
	}
	$author = $_POST['author'];
	if (isset($_POST['best'])) $best = 1;
	else $best = 0;
	$descr = mysqli_real_escape_string($connect, $_POST['book__descr']);
	$sql = "UPDATE `books` SET `book_title`='$title',`book_orig`='$origtitle',`book__genres`='$genres',`author_id`='$author',`book_year`='$year',`book_descr`='$descr',`bestceller`='$best' WHERE `book_id` = $item";
	$res = mysqli_query($connect, $sql);
	if ($res) {
		unset($_POST['updateBook']);
		header('location:admin__catalog.php');
	} else {
		echo  mysqli_error($connect);
	}
}

if (isset($_POST['updateAuthor'])) {
	$item = $_POST['authorid'];
	if (isset($_FILES['cover'])) {
		$file = $_FILES['cover'];
		if ($file['error'] === UPLOAD_ERR_OK) {
			$original_name = basename($file['name']);
			$new_name = (string)$item . '.jpg';
			$target_directory = '../img/authors/';
			$target_path = $target_directory . $new_name;
			move_uploaded_file($file['tmp_name'], $target_path);
		}
	}

	$name = mysqli_real_escape_string($connect, $_POST['name']);
	$origname = mysqli_real_escape_string($connect, $_POST['origname']);
	$year = mysqli_real_escape_string($connect, $_POST['year']);
	$city = mysqli_real_escape_string($connect, $_POST['city']);
	$country = mysqli_real_escape_string($connect, $_POST['country']);
	$descr = mysqli_real_escape_string($connect, $_POST['author__descr']);
	$sql = "UPDATE authors SET `author_name`='$name',`author_orig_name`='$origname',`author_city`='$city',`author_country`='$country',`author_birthday`=$year,author_descr='$descr' WHERE `author_id`=$item ";
	$res = mysqli_query($connect, $sql);
	if ($res) {
		unset($_POST['updateAuthor']);
		header('location:admin__catalog.php');
	} else {
		echo  mysqli_error($connect);
	}
}
