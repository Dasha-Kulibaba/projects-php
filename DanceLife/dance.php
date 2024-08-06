<?php
require("connect.php");
$dance = "Select * from `dance_categories` where dc_id=" . $_GET['dance'];
$dancquery = mysqli_query($connect, $dance);
$DC = mysqli_fetch_array($dancquery, MYSQLI_ASSOC);
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
			<div class="main__dance">
				<div class="dance__container">
					<?php
					echo '<h1 class="about-school__title dance__title">' . $DC['dc_name'] . ' </h1>';
					?>
					<div class="dance__info">
						<div class="dance__flex">
							<div class="dance__text">
								<?php echo $DC['dc_about']; ?>
							</div>
							<div class="dance__image">
								<img src="images/dances/<?php echo $DC['dc_id']; ?>.jpg" alt="" />
							</div>
						</div>
						<hr />
						<div class="dance__price">
							<?php
							$dancestyle = "select * from `dances` where dance_category=" . $_GET['dance'];
							$dquery = mysqli_query($connect, $dancestyle);
							while ($dstyle = mysqli_fetch_array($dquery, MYSQLI_ASSOC)) {
								echo '<div class="price__item">
								<div class="price__info">
									<p class="price__name">' . $dstyle['dance_name'] . '</p>
									<p class="price__cost">' . $dstyle['dance_price'] . ' грн</p>
								</div>
								<a href="#" class="price__call"> Записатись</a>
							</div>';
							}
							?>


							<!-- 
							<div class="price__item">
								<div class="price__info">
									<p class="price__name">Брейк данс</p>
									<p class="price__cost">11111 грн</p>
								</div>
								<a href="#" class="price__call"> Записатись</a>
							</div>
							<div class="price__item">
								<div class="price__info">
									<p class="price__name">Вог</p>
									<p class="price__cost">11111 грн</p>
								</div>
								<a href="#" class="price__call"> Записатись</a>
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