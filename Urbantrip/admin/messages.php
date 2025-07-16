<?php
require('../components/connection.php');

if (!isset($_SESSION['admin'])) {
	$returnUrl = "/index.php";
	header('location:' . $returnUrl);
}

$result = mysqli_query($db, 'SELECT * FROM feedbacks ');

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
			<section class="main-messages">
				<div class="container messages-container">
					<div class="messages-content">
						<ul class="messages-list">
							<?php
							while ($row = mysqli_fetch_array($result)) {
								echo ('							<li class="mesage-item">
								<div class="mesage-content">
									<span>' . $row['email'] . '</span>
									<p>
										' . $row['message'] . '
									</p>
								</div>
								<a ');
								if (!$row['is_read']) {
									echo ('href="../actions/readmes.php?id=' . $row['id'] . '" title="Позначити прочитаним" ');
								} else {
									echo (' title="Прочитане" ');
								}
								echo ('" class="messages-check"><img class="');
								if ($row['is_read']) {
									echo ('readmes');
								}
								echo ('"src="../img/check.svg" /></a>
							</li>
							<hr />
							');
							}
							?>



						</ul>
					</div>
				</div>
			</section>
		</main>
	</div>
</body>

</html>