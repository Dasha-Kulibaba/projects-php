<?php
require('variables.php');
mysqli_begin_transaction($db);
mysqli_query($db, 'UPDATE tours SET likes=likes+1 WHERE id =' . $_GET['item_id']);
mysqli_commit($db);
$result = mysqli_query($db, 'SELECT * FROM tours WHERE id =' . $_GET['item_id']);

$row = mysqli_fetch_assoc($result);



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
			<section class="main-element">
				<div class="container element-container">
					<div class="element-content">
						<div class="element-head">
							<div class="item-img element-img">
								<img src="../img/tours/<?php echo ($row['cover']) ?>" alt="example" />
							</div>
							<div class="element-name">
								<h4><?php echo ($row['name']) ?></h4>
								<audio src="../audio/<?php echo ($row['audio']) ?> " controls></audio>
							</div>
						</div>
						<p class="element-text">
							<?php echo ($row['descr']) ?>
						</p>
					</div>
				</div>
			</section>
		</main>
		<?php require("../components/footer.php") ?>
	</div>
</body>

</html>