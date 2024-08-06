<?php
require("connect.php");
$danceCat = "Select * from `dance_categories`";
$query = mysqli_query($connect, $danceCat);
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
			<div class="main__container">
				<div class="main__categories">
					<div class="categories__grid">
						<?php
						$i = 1;
						while ($dance = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
							echo '<div class="category__item">
							<div class="category__image">
								<img src="images/dance0' . $i . '.svg" alt="" />
								<div class="image__triangle">
									<img src="images/triangle.svg" alt="" />
									<p>0' . $i . '</p>
								</div>
							</div>
							<a href="dance.php?dance=' . $dance['dc_id'] . '" class="category__name">' . $dance['dc_name'] . '</a>
							<hr />
							<ul class="category__list">';
							$styles = "SELECT * from dances where dance_category=" . $dance['dc_id'];
							$styleQuery = mysqli_query($connect, $styles);
							while ($style = mysqli_fetch_array($styleQuery, MYSQLI_ASSOC)) {
								echo '<li class="category__list-item">' . $style['dance_name'] . '</li>';
							}
							echo '
							</ul>
							<hr />
						</div>';
							$i++;
						}
						?>
					</div>
				</div>
			</div>
			<div class="main__feedback main__advantages">
				<div class="advantages__container">
					<div class="feedback__top advantages__top"></div>
					<div class="feedback__content advantages__content">
						<div class="feedback advantages">
							<div class="feedback__title">
								<img src="images/triangle.svg" alt="" />
								<p>наші <span>переваги</span></p>
							</div>
							<div class="advantages__grid">
								<div class="advantages__item">
									<div class="advantages__icon">
										<img src="images/people.svg" alt="" />
									</div>
									<div class="advantages__info">
										<p class="advantages__name">50 груп</p>
										<p class="advantages__text">
											Для вас ми відкрили групи різних направлень на будь який
											смак
										</p>
									</div>
								</div>
								<div class="advantages__item">
									<div class="advantages__icon">
										<img src="images/adv_map.svg" alt="" />
									</div>
									<div class="advantages__info">
										<p class="advantages__name">Зручне Розташування</p>
										<p class="advantages__text">
											Ми знаходимося в п’яти хвилинах від залізничного вокзалу
										</p>
									</div>
								</div>
								<div class="advantages__item">
									<div class="advantages__icon">
										<img src="images/adv_clock.svg" alt="" />
									</div>
									<div class="advantages__info">
										<p class="advantages__name">Графік роботи</p>
										<p class="advantages__text">
											Ми працюємо для Вас щодня без вихідних з 9:00 до 21:00
										</p>
									</div>
								</div>
								<div class="advantages__item">
									<div class="advantages__icon">
										<img src="images/wallet.svg" alt="" />
									</div>
									<div class="advantages__info">
										<p class="advantages__name">Система оплати</p>
										<p class="advantages__text">
											Для Вашої зручності оплата здійснюється готівкою та
											безготівково
										</p>
									</div>
								</div>
							</div>
						</div>
						<img src="images/advantages.png" alt="" class="feedback__image advantages__image" />
					</div>
				</div>
				<div class="feedback__bottom advantages__bottom">
					<div class="feedback__green"></div>
				</div>
			</div>
			<div class="main__about">
				<div class="about__container">
					<div class="about__name">
						<div class="teachers__title">
							<img src="images/triangle.svg" alt="" />
							<p>про нас</p>
						</div>
					</div>
					<div class="about__info">
						<div class="about__image">
							<img src="images/about.jpg" alt="" />
						</div>
						<p class="about__text">
							Школа танців DanceLife – це місце для тих, хто прагне бути в курсі сучасного танцювального мистецтва, навчитися красиво рухатися, здобути знання та досвід від професіоналів, розвивати свій талант та вдосконалювати навички, відчувати гармонію з тілом і просто добре проводити час. У нас працює команда викладачів світового рівня, які заряджають енергією, вміють надихнути на заняттях і готові навчити вас захоплюючих стилів танцю.
						</p>
						<a href="about.php" class="teachers__more about__more">
							<span>Детальніше</span>
						</a>
					</div>
				</div>
			</div>
			<?php
			require(__DIR__ . "/components/feedback.php");
			?>
		</main>
		<?php
		require(__DIR__ . "/components/footer.php");
		?>
	</div>

	<script src="js/script.js"></script>
</body>

</html>