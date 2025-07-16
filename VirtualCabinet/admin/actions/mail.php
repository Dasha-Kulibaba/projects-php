<?php
require('../connect.php');
if (!isset($_POST["email"])) {
	$return = "../../index.php";
	header('location:' . $return);
	exit();
}
$email = $_POST["email"];
$_SESSION['email_code'] = uniqid();
$_SESSION['email_name'] = mysqli_real_escape_string($db, $_POST['username']);



$to = "recipient@example.com";
$subject = "Верифікація пошти";
$message = "Код для верифікації:" . $_SESSION['email_code'];
$headers = "From: your_email@example.com\r\n";
$headers .= "Reply-To: your_email@example.com\r\n";
$headers .= "X-Mailer: PHP/" . phpversion();

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
				<?php
				echo "<p>Лист успішно надіслано! Перевірте пошту(лист міг потрапити до 'спаму)'</p>";
				echo '
			<form action="../actions/verify.php" method="post">
			<input type="text" name="code" placeholder="Введіть код з листа" value="' . $_SESSION['email_code'] . '">
			<input type="email" name="email" value="' . $email . '" hidden>
			<button type="submit" class="button__item">Далі</button>
		</form>
	';
				// if (mail($to, $subject, $message, $headers)) {

				// } else {
				// 	echo "Помилка при надсиланні листа.";
				// 	unset($_SESSION[$email], $email);
				// }


				?>
			</div>
		</div>
	</section>
</body>

</html>