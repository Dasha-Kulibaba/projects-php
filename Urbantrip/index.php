<?php

$main = "index.php";
$tours = "html/tours.php";
$search = "html/search.php";
$icon_src = "img/search.svg";



$about = "html/about.php";
$feedback = "html/feedback.php";
$script = "js/header.js";
$avatar = "img/avatar.svg";
$signup = "html/autorization.php";
$favorite = "html/favorites.php";

$quit = "actions/signout.php";
$dislike = 'img/empty_heart.svg';
require('components/connection.php');
$admin = "admin/index.php";

$result = mysqli_query($db, 'SELECT id, name, cover FROM tours order by likes desc limit 0,6');

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Urban Trip</title>
	<link rel="stylesheet" href="css/style.css" />
</head>

<body>
	<div class="wrapper">
		<?php require("components/header.php") ?>
		<main class="main">
			<section class="main-page">
				<div class="container page-container">
					<div class="page-content">
						<h1 class="page-title">
							Аудіоекскурсії містами України та Європи
						</h1>
					</div>
				</div>
			</section>
			<section class="main-popular">
				<div class="container popular-container">
					<div class="popular-content">
						<h2 class="popular-title">Популярні</h2>
						<div class="item-grid popular-grid">
							<?php
							if ($result) {
								while ($row = mysqli_fetch_assoc($result)) {
									$id = $row['id'];
									$name = $row['name'];
									$cover = 'img/tours/' . $row['cover'];
									$link = "html/item.php?item_id=" . $id;
									if (isset($_SESSION['user'])) {
										$likes = mysqli_query($db, "SELECT tour_id from favorite where user_id=" . $_SESSION['user'] . " AND tour_id=$id");
										if ($likes->num_rows != 0) {
											$heart = 'img/full_heart.svg';
											$like = "actions/dislike.php?like=$id";
										} else {
											$heart = 'img/empty_heart.svg';
											$like = "actions/like.php?like=$id";
										}
									}
									require("components/item.php");
								}
							}
							?>
						</div>
					</div>
				</div>
			</section>
		</main>
		<?php require("components/footer.php")  ?>
	</div>
</body>

</html>