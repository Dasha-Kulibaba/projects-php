<?php
require('variables.php');

$result = false;

if (isset($_GET['search'])) {
	$result = mysqli_query($db, 'SELECT id, name, cover FROM tours where name LIKE "%' . $_GET['search'] . '%"');
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Urban Trip</title>
	<link rel="stylesheet" href="../css/style.css" />
</head>

<body>
	<div class="wrapper">
		<?php require("../components/header.php") ?>
		<main class="main">
			<section class="main-search">
				<div class="container search-container">
					<div class="search-content">
						<form action="search.php" method="get" id="search-form">
							<div class="search-form">
								<input
									type="text"
									name="search"
									placeholder="Введіть ваш запит"
									required />
								<img id="search-icon" src="../img/search.svg" />
							</div>
						</form>
						<div class="item-grid search-grid">
							<?php
							if ($result) {
								while ($row = mysqli_fetch_assoc($result)) {
									$id = $row['id'];
									$name = $row['name'];
									$cover = '../img/tours/' . $row['cover'];
									$link = "item.php?item_id=" . $id;
									if (isset($_SESSION['user'])) {
										$likes = mysqli_query($db, "SELECT tour_id from favorite where user_id=" . $_SESSION['user'] . " AND tour_id=$id");
										if ($likes->num_rows != 0) {
											$heart = '../img/full_heart.svg';
											$like = "../actions/dislike.php?like=$id";
										} else {
											$heart = '../img/empty_heart.svg';
											$like = "../actions/like.php?like=$id";
										}
									}
									require("../components/item.php");
								}
							}
							?>

						</div>
					</div>
				</div>
			</section>
		</main>
		<?php require("../components/footer.php") ?>
		<script>
			const search = document.getElementById('search-form');
			const search_icon = document.getElementById('search-icon');
			search_icon.addEventListener('click', function() {
				search.submit();
			})
		</script>
	</div>
</body>

</html>