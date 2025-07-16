<?php
require('connect.php');

?>


<!DOCTYPE html>
<html lang="uk">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="robots" content="index, follow" />
	<meta name="language" content="uk" />
	<meta name="author" content="МФК СумДУ" />
	<meta name="copyright" content="© Машинобудівний фаховий коледж СумДУ" />

	<meta
		name="description"
		content="Доступ до навчально-методичних матеріалів для молодих викладачів Машинобудівного фахового коледжу СумДУ." />

	<meta property="og:type" content="website" />
	<meta
		property="og:title"
		content="Віртуальний методичний кабінет МФК СумДУ" />
	<meta
		property="og:description"
		content="Доступ до навчально-методичних матеріалів та цифрова підтримка викладачів МФК." />
	<meta property="og:url" content="https://mk.sumdu.edu.ua/" />

	<link rel="icon" href="../images/logo/logo.ico" type="image/x-icon" />
	<link rel="stylesheet" href="../styles/styles.css" />

	<title>Віртуальний кабінет МФК СумДУ - Планер</title>
</head>

<body>

	<main>
		<section class="autorize">
			<div class="container autorize__container ">
				<div class="autorize__content">
					<?php
					if (isset($_SESSION['admin'])) {
						echo '<div class="autorize__buttons">	
						
		<a href="young/index.php" class="button__item">Молодому викладачу</a>
		<a href="sertification/index.php" class="button__item">Атестація викладачів</a>
		<a href="qualify/index.php" class="button__item">Підвищення кваліфікації</a>
		<a href="exhibition/index.php" class="button__item">Методична виставка</a>
		<a href="planner/index.php" class="button__item">Планер</a>
			<a href="actions/signout.php" class="button__item">Вийти з облікового запису</a>
			<a href="../../index.php" class="button__item">На головну</a>
	</div>
						
						';
					} else {
						echo '
			<form action="actions/signup.php" method="post">
				<input type="text" name="login" placeholder="Логін">
				<input type="text" name="password" placeholder="Пароль">
				';
						echo '
				<button type="submit" class="button__item">Увійти</button>
			</form>
	';
					}
					?>
				</div>
			</div>
		</section>
	</main>

</body>

</html>