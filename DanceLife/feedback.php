<?php
require("connect.php");
$feedbacks = "Select * from `feedbacks`";
$feedbackquery = mysqli_query($connect, $feedbacks);
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>DanceLife Studio</title>
	<link href="https://fonts.googleapis.com/css?family=Montserrat:regular,500,700&display=swap" rel="stylesheet" />
	<link rel="stylesheet" href="css/zerostyle.css" />
	<link rel="stylesheet" href="css/style.css" />
</head>

<body>
	<div class="wrapper">
		<?php
		require(__DIR__ . "/components/header.php");
		?>
		<main class="main">
			<div class="main__feedback-page">
				<div class="feedback-page__container">
					<div class="feedback-page__info">
						<h1 class="about-school__title dance__title">Відгуки про нас</h1>
						<div class="feedback-page__grid">
							<?php
							while ($feedres = mysqli_fetch_array($feedbackquery, MYSQLI_ASSOC)) {
								echo ' <div class="feedback-page__item">
								<p class="feedback-page__text">
								' . $feedres['feedback_text'] . '
								</p>
								<div class="feedback-page__author">
									<div class="feedback-page__icon">
										<img src="images/feedbacks/' . $feedres['feedback_id'] . '.jpg" alt="" />
									</div>
									<p class="feedback-page__name">' . $feedres['feedback_author'] . '</p>
								</div>
							</div>';
							}
							?>
							<!-- 
							<div class="feedback-page__item">
								<p class="feedback-page__text">
									Я вважаю, що це просто чудово, коли в одному і тому ж місці
									ти можеш і підкоригувати своє тіло і фігуру, і потанцювати
									ті танці, які тобі подобаються. Саме цим школа унікальна.
								</p>
								<div class="feedback-page__author">
									<div class="feedback-page__icon">
										<img src="images/Human-like-Avatar-3-640x480.jpg" alt="" />
									</div>
									<p class="feedback-page__name">Артур Артуров</p>
								</div>
							</div>
							<div class="feedback-page__item">
								<p class="feedback-page__text">
									Я вважаю, що це просто чудово, коли в одному і тому ж місці
									ти можеш і підкоригувати своє тіло і фігуру, і потанцювати
									ті танці, які тобі подобаються. Саме цим школа унікальна.
								</p>
								<div class="feedback-page__author">
									<div class="feedback-page__icon">
										<img src="images/Human-like-Avatar-3-640x480.jpg" alt="" />
									</div>
									<p class="feedback-page__name">Артур Артуров</p>
								</div>
							</div>
							<div class="feedback-page__item">
								<p class="feedback-page__text">
									Я вважаю, що це просто чудово, коли в одному і тому ж місці
									ти можеш і підкоригувати своє тіло і фігуру, і потанцювати
									ті танці, які тобі подобаються. Саме цим школа унікальна.
								</p>
								<div class="feedback-page__author">
									<div class="feedback-page__icon">
										<img src="images/Human-like-Avatar-3-640x480.jpg" alt="" />
									</div>
									<p class="feedback-page__name">Артур Артуров</p>
								</div>
							</div> -->
						</div>
					</div>
				</div>
			</div>
		</main>
		<?php
		require(__DIR__ . "/components/footer.php");
		?>
	</div>
	<script src="js/script.js"></script>
</body>

</html>