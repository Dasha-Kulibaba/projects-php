<?php
require('variables.php');

$result = mysqli_query($db, '
SELECT city.id AS city_id, countries.name AS country, city.name AS city
FROM countries
JOIN city ON countries.id = city.country_id
JOIN tours ON city.id = tours.city_id;
');

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
		<?php require("../components/header.php") ?>
		<main class="main">
			<section class="main-tours">
				<div class="container tours-container">
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
				</div>
			</section>
		</main>
		<?php require("../components/footer.php") ?>
	</div>
</body>

</html>