<?php
require_once('../db.php');
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../css/zerostyle.css">
	<link rel="stylesheet" href="admin.css">
	<link href="https://fonts.googleapis.com/css?family=Montserrat:regular,500,600,700&display=swap" rel="stylesheet">
	<title>Адмін панель</title>
</head>

<body>
	<div class="wrapper">
		<form action="index__admin.php" method="post" class="authorization">
			<h1>Авторизація</h1>
			<label for="login">
				Логін
			</label>
			<input type="text" name="login" placeholder="Логін">
			<label for="pass">
				Пароль
			</label>
			<input type="password" name="pass" placeholder="Пароль" autocomplete="off">
			<p>
				<?php
				if (isset($_POST['submit'])) {
					if (empty($_POST['login']) || empty($_POST['pass']))
						echo 'Ви не ввели логін або пароль';

					else {
						$login = $_POST['login'];
						$pass = $_POST['pass'];
						$sql = "SELECT * FROM admins where  admin_login='$login' and admin_pass='$pass'";
						$query = mysqli_query($connect, $sql);
						$result = mysqli_fetch_row($query);
						if ($result) {
							$_SESSION['admin'] = $login;
							header('location:admin__catalog.php');
						} else {
							unset($_SESSION['admin']);
							echo 'Неправильно введено логін або пароль';
						}
					}
				}

				?>
			</p>
			<button type="submit" name="submit">Увійти</button>
		</form>
	</div>
</body>

</html>