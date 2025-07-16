<?php
require('variables.php');

$result = mysqli_query($db, 'SELECT id, name, cover FROM tours WHERE city_id =' . $_GET['city_id']);


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
			<section class="main-catalog">
				<div class="container catalog-container">
					<div class="catalog-content">
						<h3 class="catalog-title">Екскурсії по місту <?php echo ($_GET['city_name']) ?></h3>
						<div class="item-grid catalog-grid">
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
	</div>
</body>

</html>