<?php
require('variables.php');
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
						<form action="../actions/signup.php" method="post" id="form">
							<p>Авторизація</p>
							<input type="text" placeholder="логін" id="login" name="login" pattern="[A-Za-z]+" />
							<input type="text" placeholder="пароль" id="password" name="password" pattern="[A-Za-z]+" />
							<p class=" form-guestion">ще не маєте акаунту?
								<a href="registry.php">Зареєструйтесь</a>
							</p>
							<button type="submit" class="form-sign">Увійти</button>
						</form>
					</div>
				</div>
			</section>
		</main>
	</div>
	<script src="../js/signup.js"></script>
</body>

</html>