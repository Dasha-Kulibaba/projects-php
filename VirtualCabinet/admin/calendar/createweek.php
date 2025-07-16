<?php

require('../connect.php');
CheckAdmin();

$week_c = $_GET['week'] ? $_GET['week'] : "";
$month_c = $_GET['month'] ? $_GET['month'] : "";
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="../../styles/styles.css" />

</head>


<body>
	<section class="autorize">
		<div class="container autorize__container ">
			<div class="autorize__content">
				<form action="../actions/addweek.php" method="post">
					<input type="text" maxlength="230" required name="title" placeholder="Назва">
					<input type="number" name="week_number" readonly value="<?php echo ($week_c) ?>">
					<input type="month" name="month" readonly value="<?php echo ($month_c); ?>">
					<button type="submit" class="button_item">Додати</button>
				</form>

			</div>
		</div>
	</section>
</body>

</html>