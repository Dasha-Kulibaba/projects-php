<?php
require('variables.php')
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
	<div class="wrapper" style="max-height: 100vh">
		<?php require("../components/header.php") ?>
		<main class="main">
			<section class="main-form">
				<div class="container form-container">
					<div class="form-content">
						<form action="../actions/feedback.php" method="post">
							<p>Заповніть форму зворотнього зв’язку</p>
							<input type="text" placeholder="email" required name="email" />
							<textarea
								name="message"
								placeholder="Ваше повідомлення" required></textarea>
							<button type="submit">Надіслати</button>
						</form>
					</div>
				</div>
			</section>
		</main>
	</div>
</body>

</html>