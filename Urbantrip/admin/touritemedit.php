<?php
require('../components/connection.php');

if (!isset($_SESSION['admin'])) {
	$returnUrl = "/index.php";
	header('location:' . $returnUrl);
}

$id = $_GET['id'];
$result = mysqli_query($db, 'SELECT * from tours WHERE id=' . $id);
$row = mysqli_fetch_array($result);
$countries = mysqli_query($db, ' SELECT * from city')
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
			<section class="main-tour">
				<div class="container tour-container">
					<div class="tour-content">
						<form action="../actions/update.php?id=<?php echo ("$id") ?>" method="post" enctype="multipart/form-data">
							<?php
							echo ('
													<input type="text" name="name" required placeholder="назва" value="' . $row['name'] . '" />
													<span>Обкладинка</span>
							<input type="file" id="cover" name="cover" />
							<div class="item-img"><img id="updimg"  src="../img/tours/' . $row['cover'] . '" /></div>
							<span>аудіо</span>
							<input type="file" name="audio" />
							<audio src="../audio/' . $row['audio'] . '" controls></audio>
							<textarea name="descr" placeholder="опис" required>' . $row['descr'] . '</textarea>
							<select name="city">');
							while ($city = mysqli_fetch_array($countries)) {
								echo ('<option value="' . $city['id'] . '"');
								if ($row['city_id'] == $city['id']) echo ('selected');
								echo ('>' . $city['name'] . '</option>');
							}
							echo ('
							</select>
							')
							?>

							<button type="submit" class="tour-new">Оновити</button>
						</form>
					</div>
				</div>
			</section>
		</main>
	</div>
</body>

</html>