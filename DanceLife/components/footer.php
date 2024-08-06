<footer class="footer">
	<div class="teachers">
		<div class="footer__teachers footer__container">
			<div class="teachers__title">
				<img src="images/triangle.svg" alt="">
				<p>Наші <br> викладачі</p>
				<a href="about.php" class="teachers__more">
					<span>Детальніше</span>
				</a>
			</div>
			<div class="teachers__block">
				<?php
				$tutors = "Select * from `teachers`,`dances` where teachers.dance_id=dances.dance_id LIMIT 0,3";
				$tutorquery = mysqli_query($connect, $tutors);
				while ($tut = mysqli_fetch_array($tutorquery, MYSQLI_ASSOC)) {
					echo ' <div class="teacher__item">
					<div class="teacher__photo">
						<img src="images/teachers/' . $tut['teacher_id'] . '.jpg" alt="">
					</div>
					<div class="teacher__info">
						<p class="teacher__name">
						' . $tut['teacher_surname'] . ' ' . $tut['teacher_name'] . '
						</p>
						<p class="teacher__spec">
						' . $tut['dance_name'] . '
						</p>
					</div>

				</div>';
				}
				?>
			</div>
		</div>
		<div class="teachers-bottom__container">
			<div class="footer__bottom">
				<div class="main_top footer__figure">
					<div class="green-block"></div>
					<div class="main_tr"></div>
					<div class="main_wh"></div>
				</div>
			</div>
		</div>
		<div class="footer__info info__container">
			<div class="footer__contacts">
				<div class="contacts-block">
					<div class="contacts__item">
						<img src="images/map.svg" alt="">
						<p>Суми, Привокзальна вулиця, 25</p>
					</div>
					<div class="contacts__item">
						<img src="images/phone.svg" alt="">
						<p>+38(012) 345 6789</p>
					</div>
					<div class="contacts__item">
						<img src="images/clock.svg" alt="">
						<p>з 9:00 до 21:00</p>
					</div>
				</div>
				<div class="contacts__copyright">
					<p>© 2024 | всі права захищено</p>
					<p>DanceLife Studio</p>
				</div>
			</div>
			<img src="images/footer_image.png" alt="" class="footer__image">
		</div>
	</div>
</footer>