<?php
require("connect.php");
$teachers = "Select * from `teachers`,`dances` where teachers.dance_id=dances.dance_id";
$query = mysqli_query($connect, $teachers);
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
			<div class="main__about-school">
				<div class="about-school__container">
					<h1 class="about-school__title">Про школу</h1>
					<div class="about-school__info">
						<div class="about-school__image">
							<img src="images/about-school.jpg" alt="" />
						</div>
						<p class="about-school__text">
							Школа танців DanceLife – це місце для тих, хто прагне бути в курсі сучасного танцювального мистецтва, навчитися красиво рухатися, здобути знання та досвід від професіоналів, розвивати свій талант та вдосконалювати навички, відчувати гармонію з тілом і просто добре проводити час. У нас працює команда викладачів світового рівня, які заряджають енергією, вміють надихнути на заняттях і готові навчити вас захоплюючих стилів танцю.
						</p>
					</div>
				</div>
			</div>
			<div class="main__our-teachers">
				<div class="our-teachers__container">
					<h1 class="about-school__title">Наші викладачі</h1>
					<div class="our-teachers__info">
						<div class="our-teachers__grid">
							<?php
							while ($tutor = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
								echo '<div class="our-teachers__item">
								<div class="our-teacher__image">
									<img src="images/teachers/' . $tutor['teacher_id'] . '.jpg" alt="" />
								</div>
								<div class="our-teachers-info">
									<p class="our-teacher__name">' . $tutor['teacher_surname'] . ' ' . $tutor['teacher_name'] . '</p>
									<p>' . $tutor['dance_name'] . '</p>
								</div>
							</div>';
							}
							?>
							<!-- 
							<div class="our-teachers__item">
								<div class="our-teacher__image">
									<img src="images/teacher2.jpg" alt="" />
								</div>
								<div class="our-teachers-info">
									<p class="our-teacher__name">Астафьєва Олександра</p>
									<p>Сальса</p>
								</div>
							</div>
							<div class="our-teachers__item">
								<div class="our-teacher__image">
									<img src="images/teacher3.jpg" alt="" />
								</div>
								<div class="our-teachers-info">
									<p class="our-teacher__name">Маркелов Артур</p>
									<p>Брейк данс</p>
								</div>
							</div>
							<div class="our-teachers__item">
								<div class="our-teacher__image">
									<img src="images/teacher1.jpg" alt="" />
								</div>
								<div class="our-teachers-info">
									<p class="our-teacher__name">Чорнишова Вероніка</p>
									<p>Дитячі танці</p>
								</div>
							</div>

							<div class="our-teachers__item">
								<div class="our-teacher__image">
									<img src="images/teacher3.jpg" alt="" />
								</div>
								<div class="our-teachers-info">
									<p class="our-teacher__name">Маркелов Артур</p>
									<p>Брейк данс</p>
								</div>
							</div>
							<div class="our-teachers__item">
								<div class="our-teacher__image">
									<img src="images/teacher2.jpg" alt="" />
								</div>
								<div class="our-teachers-info">
									<p class="our-teacher__name">Астафьєва Олександра</p>
									<p>Сальса</p>
								</div>
							</div> -->
						</div>
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