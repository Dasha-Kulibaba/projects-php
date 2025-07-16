<?php
require('../components/connection.php');

$result = mysqli_query($db, '
SELECT city.id AS city_id, countries.name AS country, city.name AS city
FROM countries
LEFT JOIN city ON countries.id = city.country_id
');

$countries = mysqli_query($db, 'SELECT * from countries');
$list = [];


if ($result) {
	while ($row = mysqli_fetch_assoc($result)) {
		$country = $row["country"];
		$city = $row["city"];
		$city_id = $row["city_id"];

		if (!isset($list[$country])) {
			$list[$country] = [];
		}

		$list[$country][$city_id] = $city;
	}
	mysqli_free_result($result);
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
			<section class="main-tours">
				<div class="container tours-container">
					<div class="admin-countries">
						<div class="tours-content">
							<?php
							foreach ($list as $country => $cities) {
								echo ('<ul class="country-list">
	<li class="country-title">' . $country . '</li>');
								foreach ($cities as $city_id => $city_name) {
									echo ('<li class="country-item">
		<a href="catalog.php?city_id=' . $city_id . '&&city_name=' . $city_name . '" class="town-link">' . $city_name . '</a>
	</li>');
								}
								echo ('</ul>');
							}

							?>
						</div>
						<div class="tours-form">
							<form action="../actions/addcountry.php" method="post">
								<input
									type="text"
									name="country"
									placeholder="назва країни"
									required />
								<button type="submit">додати країну</button>
							</form>
							<form action="../actions/addcity.php" method="post">
								<fieldset>
									<input type="text" name="city" placeholder="назва міста" required />
									<select name="country">
										<?php
										while ($country = mysqli_fetch_array($countries)) {
											echo ('<option value="' . $country['id'] . '">' . $country['name'] . '</option>
	');
										}
										?>
									</select>
								</fieldset>
								<button type="submit">Додати місто</button>
							</form>
						</div>
					</div>
				</div>
			</section>
		</main>
	</div>
</body>

</html>