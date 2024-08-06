<header class="header">
	<div class="header__container">
		<a href="index.php" class="header__logo"><img src="img/logo.svg" alt="BookNook"></a>
		<nav class="header__menu menu">
			<ul class="menu__list">
				<li class="menu__item menu__book"><a href="#" class="menu__link">книги</a></li>
				<li class="menu__item"><a href="authors.php" class="menu__link">Автори</a></li>
			</ul>
		</nav>
		<form action="search.php" method="get" for="search" class="header__search">
			<img src="img/search.svg" alt="search" class="searchicon">
			<input type="search" name="search" placeholder="Пошук" class="searchinput">
		</form>
		<div class="menu__block block">
			<div class="block__item"></div>
			<div class="block__item"></div>
			<div class="block__item"></div>
		</div>

	</div>
	<div class="header__mobmenu mobmenu ">
		<div class="mobmenu__item">КНИГИ</div>
		<div class="mobmenu__item"><a href="authors.php">АВТОРИ</a></div>
		<div class="mobmenu__item"><a href="about.php">ПРО ПРОЄКТ</a></div>
	</div>
	<form action="search.php" method="get" class="search__mob">
		<input type="search" name="search" class="search__mob-input">
		<img src="img/search.svg">
	</form>
	<div class="header__genres hgenres">
		<div class="hgenres__container">
			<ul class="hgenres__list">

				<?php
				while ($res = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
					echo '<div>';
					for ($i = 0; $i < 2; $i++) {
						if ($i == 1) $res = mysqli_fetch_array($query, MYSQLI_ASSOC);
						echo '<li class="hgenres__item"><a href="books.php?genre=' . $res['genre_name'] . '">' . $res['genre_name'] . '</a>
									</li>';
					}
					echo '</div>';
				}
				?>
				<li class="hgenres__item"><a href="collection.php?collection=newbooks">добірки</a>
					<ul class="hgenres__sublist sublist">
						<li class="sublist__item"><a href="collection.php?collection=newbooks">Новинки</a></li>
						<li class="sublist__item"><a href="collection.php?collection=popular">популярні зараз</a></li>
						<li class="sublist__item"><a href="collection.php?collection=best">бестселери</a></li>
					</ul>
				</li>
			</ul>

		</div>

	</div>
</header>