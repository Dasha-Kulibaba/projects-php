<?php
require('../php/connect.php');
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

	<title>Віртуальний кабінет МФК СумДУ - Атестація викладачів</title>
</head>

<body>
	<div class="header__hidden hidden__calendar" id="hidden__calendar">
		<img
			src="../images/system/close.svg"
			class="hidden__close"
			id="hidden_close" />
		<div class="calendar">
			<div class="calendar__container">
				<h2 id="hidden_month_name"></h2>
				<div id="hidden_calendar"></div>
			</div>
		</div>
	</div>
	<div class="hidden__calendar" id="modal_body">
		<img src="../images/system/close.svg" class="hidden__close" id="modal_close">
		<div class="modal_content" id="modal_content"></div>
	</div>
	<header class="header" role="banner">
		<div class="header__container header__container-background">
			<div class="header__container-logo">
				<a
					class="header__container-logo-link"
					href="../index.php"
					aria-label="Повернутись на головну">
					<img
						class="header__container-logo-img"
						src="../images/logo/logo.svg"
						alt="Логотип Віртуального кабінету МФК СумДУ"
						loading="lazy"
						itemprop="logo"
						width="120"
						height="auto" />
				</a>
			</div>
			<div class="header__container-title">
				<h1 class="header__container-title-h2">
					Віртуальний методичний кабінет МФК СумДУ
				</h1>
			</div>
			<div class="header__container-button">
				<button
					class="header__container-button-btn"
					type="button"
					aria-label="Відкрити розділ Плану"
					id="planner">
					План
				</button>
			</div>
			<div class="header__container-sin hidden-mobile">
				<?php
				if (!isset($_SESSION['admin'])) {
					echo '				<a		class="header__container-sin-link"
					href="../admin/index.php"
					aria-label="Перейти до особистого кабінету">
					<img
						class="header__container-sin-img"
						src="../images/login/sin-white.svg"
						alt="Іконка входу"
						loading="lazy"
						itemprop="logo"
						width="32"
						height="32" />
				</a>';
				} else {
					echo '				
					<a		class="header__container-sin-link"
					href="../admin/index.php"
					aria-label="Перейти до особистого кабінету">
					<img
						class="header__container-sin-img"
						src="../images/login/sin-white.svg"
						alt="Іконка входу"
						loading="lazy"
						itemprop="logo"
						width="32"
						height="32" />
				</a>';
				}
				?>
			</div>
			<button
				class="button__burger-menu burger-button visible-mobile"
				type="button"
				aria-label="Відкрити мобільне меню"
				onclick="mobileOverlay.showModal()">
				<span class="visually-hidden">Відкрити меню</span>
			</button>
		</div>
		<div
			class="header__container"
			role="navigation"
			aria-label="Головне меню">
			<nav class="header__menu hidden-mobile">
				<ul class="header__menu-list">
					<li class="header__menu-list-item">
						<a class="header__menu-list-item-link" href="../index.php">Головна сторінка</a>
					</li>
					<li class="header__menu-list-item">
						<a class="header__menu-list-item-link" href="new.php">Молодому викладачу</a>
					</li>
					<li class="header__menu-list-item">
						<a class="header__menu-list-item-link" href="qual.php">Підвищення кваліфікації</a>
					</li>
					<li class="header__menu-list-item">
						<a class="header__menu-list-item-link" href="plan.php">Планер</a>
					</li>
					<li class="header__menu-list-item">
						<a class="header__menu-list-item-link" href="expo.php">Методична виставка</a>
					</li>
					<li class="header__menu-list-item active-pointer">
						<a class="header__menu-list-item-link" href="atest.php">Атестація викладачів</a>
					</li>
				</ul>
			</nav>
		</div>
	</header>
	<main>
		<section class="info">
			<section class="catalog" aria-label="Каталог документів">
				<div class="catalog__container">
					<nav
						class="catalog__container-sidebar-atest"
						aria-label="Фільтр категорій">
						<div class="catalog__container-sidebar-filter">
							<button
								class="catalog__container-sidebar-filter__item-btn filter"
								type="button" value="1">
								Положення та нормативні документи
							</button>
							<button
								class="catalog__container-sidebar-filter__item-btn filter"
								type="button" value="2">
								Графік засідань
							</button>
							<button
								class="catalog__container-sidebar-filter__item-btn filter"
								type="button" value="3">
								Шаблони документів
							</button>
							<button
								class="catalog__container-sidebar-filter__item-btn filter"
								type="button" value="4">
								Загальні документи
							</button>
						</div>
					</nav>

					<section
						class="catalog__container-content"
						aria-live="polite"
						aria-label="Список документів">
						<ul class="catalog__container-content-list" id="content"></ul>
					</section>
				</div>
			</section>
		</section>
	</main>
	<nav class="navigation" role="navigation" aria-label="Додаткова навігація">
		<div class="header__container">
			<ul class="header__menu-list">
				<li class="header__menu-list-item">
					<a class="header__menu-list-item-link" href="../index.php">Головна сторінка</a>
				</li>
				<li class="header__menu-list-item">
					<a class="header__menu-list-item-link" href="new.php">Молодому викладачу</a>
				</li>
				<li class="header__menu-list-item">
					<a class="header__menu-list-item-link" href="qual.php">Підвищення кваліфікації</a>
				</li>
				<li class="header__menu-list-item">
					<a class="header__menu-list-item-link" href="plan.php">Планер</a>
				</li>
				<li class="header__menu-list-item">
					<a class="header__menu-list-item-link" href="expo.php">Методична виставка</a>
				</li>
				<li class="header__menu-list-item active-pointer">
					<a class="header__menu-list-item-link" href="atest.php">Атестація викладачів</a>
				</li>
			</ul>
		</div>
	</nav>
	<footer class="footer" role="contentinfo">
		<div class="footer__container">
			<address class="footer__container-title">
				Адреса: проспект Тараса Шевченка, 17, Суми, тел.
				<a href="tel:+380542220283">+38 0542 220283</a> <br />
				© Всі права захищені. Машинобудівний фаховий коледж СумДУ
			</address>
		</div>
	</footer>
	<dialog
		class="mobile-overlay visible-mobile"
		id="mobileOverlay"
		aria-labelledby="mobileOverlayTitle"
		aria-hidden="true">
		<form class="mobile-overlay__close-button-wrapper" method="dialog">
			<button
				class="mobile-overlay__close-button cross-button"
				type="submit"
				aria-label="Закрити меню">
				<span class="visually-hidden">Закрити меню</span>
			</button>
		</form>
		<div class="mobile-overlay__body">
			<ul class="mobile-overlay__list">
				<li class="mobile-overlay__item">
					<a class="mobile-overlay__link" href="../index.php">Головна сторінка</a>
				</li>
				<li class="mobile-overlay__item">
					<a class="mobile-overlay__link" href="new.php">Молодому викладачу</a>
				</li>
				<li class="mobile-overlay__item">
					<a class="mobile-overlay__link" href="qual.php">Підвищення кваліфікації</a>
				</li>
				<li class="mobile-overlay__item">
					<a class="mobile-overlay__link" href="plan.php">Планер</a>
				</li>
				<li class="mobile-overlay__item">
					<a class="mobile-overlay__link" href="expo.php">Методична виставка</a>
				</li>
				<li class="mobile-overlay__item active-pointer">
					<a class="mobile-overlay__link" href="atest.php">Атестація викладачів</a>
				</li>
				<li class="mobile-overlay__item">
					<?php
					if (!isset($_SESSION['admin'])) {
						echo '<a	href="admin/index.php"	class="mobile-overlay__link"  aria-label="Перейти до особистого кабінету"> <img class="mobile-overlay__link-sin-img" src="images/login/sin-black.svg" alt="Вхід в особистий кабінет" loading="lazy" itemprop="logo" /> </a>';
					} else {
						echo '<p></p><a	href="admin/index.php"	class="header__container-sin-link"
					aria-label="Перейти до особистого кабінету">
					<img
						class="header__container-sin-img"
						src="images/login/sin-white.svg"
						alt="Іконка входу"
						loading="lazy"
						itemprop="logo"
						width="32"
						height="32" />
				</a>';
					}
					?>
				</li>
			</ul>
		</div>
	</dialog>
	<script src="../js/atest.js"></script>
	<script src="../js/hiden_planner.js"></script>
</body>

</html>