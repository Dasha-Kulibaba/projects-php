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
						<form action="../actions/registry.php" method="post" id="form">
							<p>Реєстрація</p>
							<input type="text" placeholder="логін" id="login" name="login" pattern="[A-Za-z]+" required />
							<input type="text" placeholder="пароль" id="password" name="password" pattern="[A-Za-z]+" required />
							<input
								type="text"
								placeholder="повторіть пароль"
								id="pass_check"
								name="password-repeat"
								pattern="[A-Za-z]+" required />
							<p class="form-guestion">
								вже маєте акаунт?

								<a href="autorization.php">Авторизуйтесь</a>
							</p>
							<button type="submit" class="form-sign">Зареєструватись</button>
						</form>
					</div>
				</div>
			</section>
		</main>
	</div>
	<script src="../js/registry.js"></script>
</body>

</html>