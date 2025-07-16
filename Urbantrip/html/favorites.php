<?php
require('variables.php');

$id = $_SESSION['user'];
$result = mysqli_query($db, 'SELECT tours.id as id, tours.name as name, tours.cover as cover 
FROM favorite 
JOIN tours ON favorite.tour_id=tours.id 
WHERE favorite.user_id = ' . $id);

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
						<h3 class="catalog-title">Збережені</h3>
						<div class="item-grid catalog-grid">
							<?php
							if ($result) {
								while ($row = mysqli_fetch_assoc($result)) {
									$id = $row['id'];
									$name = $row['name'];
									$cover = '../img/tours/' . $row['cover'];
									$link = "item.php?item_id=" . $id;
									$heart = '../img/full_heart.svg';
									$like = "../actions/dislike.php?like=$id";
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