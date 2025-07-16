<?php
require('../components/connection.php');

if (!isset($_SESSION['admin'])) {
	$returnUrl = "/index.php";
	header('location:' . $returnUrl);
}

$result = mysqli_query($db, 'SELECT id, name, cover FROM tours ');

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
		<header class="header">
			<div class="container header-container">
				<div class="header-content">
					<a href="../index.php" class="header-link">UrbanTrip</a>
					<nav>
						<ul class="header-list" style="text-align: center">
							<li class="header-menu">
								<a href="messages.php" class="header-item">повідомлення <br />від користувачів</a>
							</li>
							<li class="header-menu">
								<a href="countries.php" class="header-item">міста </a>
							</li>
							<li class="header-menu">
								<a href="index.php" class="header-item">екскурсії</a>
							</li>
						</ul>
					</nav>
				</div>
			</div>
		</header>
		<main class="main">
			<section class="main-catalog">
				<div class="container catalog-container">
					<div class="catalog-content">
						<div class="item-grid catalog-grid">
							<?php
							if ($result) {
								while ($row = mysqli_fetch_assoc($result)) {
									echo ('
									<div class="item popular-item">
									<div class="item-img">
									<img src="../img/tours/' . $row['cover'] . '" alt="' . $row['name'] . '" />
	
									</div>
	<p  class="item-text">' . $row['name'] . '</p>
						<a href="touritemedit.php?id=' . $row['id'] . '"  class="item-edit">Редагувати</a>
						<a href="../actions/removeitem.php?id=' . $row['id'] . '"  class="item-delete">Видалити</a>
</div>
									');
								}
							}
							?>
						</div>
						<a href="touritem.php" class="tour-new">Додати екскурсію</a>

					</div>
				</div>
			</section>
		</main>
	</div>
	<script src="../js/removeitem.js"></script>
</body>

</html>