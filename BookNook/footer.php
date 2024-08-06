<footer class="footer">
	<div class="footer__container">
		<div class="footer__top">
			<nav class="footer__nav footer__item">
				<ul class="footer__list list">
					<li class="list__item"><a href="books.php" class="list__link">книги</a></li>
					<li class="list__item"><a href="authors.php" class="list__link">Автори</a></li>

				</ul>
				<ul class="footer__list list">
					<li class="listr__item"><a href="about.php" class="list__link">про проєкт</a></li>
					<li class="list__item"><a href="error.php" class="list__link feedback__link">зворотний зв'язок</a></li>
					<li class="list__item"><a href="copyright.php" class="list__link">Правовласникам</a></li>
				</ul>
			</nav>
			<div class="footer__info footer__item">
				<div class="footer__alert">
					<div class="footer__soc">
						<img src="img/instagram.svg" alt="instagram">
						<img src="img/telegram.svg" alt="telegram">
					</div>
					<p>Увага! Сайт може містити матеріали, не призначені для перегляду особами, які не досягли 18
						років!
					</p>
				</div>
			</div>
			<div class="footer__name">
				<a href="index.php" class="footer__logo"><img src="img/logoshort.svg" alt="BookNook"></a>
				<p>BookNook</p>
			</div>
		</div>

		<div class="footer__copyright">
			<?php $year = date("Y");
			echo "© " . $year;
			?>
			| всі права захищено
		</div>
	</div>
</footer>