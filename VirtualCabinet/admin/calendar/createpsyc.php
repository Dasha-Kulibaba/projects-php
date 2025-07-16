<?php

require('../connect.php');
CheckAdmin();

$psyc = $_GET['month'] ? $_GET['month'] : "";
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
				<form action="../actions/addpsych.php" method="post">
					<textarea name="title" placeholder="Назва"></textarea>
					<input type="month" name="month" readonly value="<?php echo ($psyc); ?>">
					<button type="submit" class="button_item">Додати</button>
				</form>
			</div>
		</div>
	</section>
</body>

</html>