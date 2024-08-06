<div class="main__feedback">
	<div class="feedback__container">
		<div class="feedback__top"></div>
		<div class="feedback__content">
			<div class="feedback">
				<div class="feedback__title">
					<img src="images/triangle.svg" alt="" />
					<p>Відгуки <span>клієнтів</span></p>
				</div>
				<?php
				$f = 0;
				$feed = "select * from `feedbacks` limit 0,5";
				$feedquery = mysqli_query($connect, $feed);
				while ($feedres = mysqli_fetch_array($feedquery, MYSQLI_ASSOC)) {
					if ($f == 0) echo '<div class="feedback__item item-visible">';
					else echo '<div class="feedback__item">';
					echo '
					<div class="feedback__avatar">
						<img src="images/feedbacks/' . $feedres['feedback_id'] . '.jpg" alt="" />
					</div>
					<div class="feedback__text">
						<p>“</p>
						<div class="feedback__layout">
							<p>
							' . $feedres['feedback_text'] . '
							</p>
							<hr />
							<p class="feedback__author">' . $feedres['feedback_author'] . '</p>
						</div>
					</div>
				</div>';
					$f++;
				}
				?>

			</div>
			<div class="feedback__arrows">
				<div class="feedback__arrow" id="first__arrow">
					< </div>
						<div class="feedback__arrow" id="second__arrow">></div>
				</div>
				<img src="images/feedback_image.png" alt="" class="feedback__image" />
			</div>
		</div>
		<div class="feedback__bottom">
			<div class="feedback__green"></div>
		</div>
	</div>
	<script src="js/feedbacks.js"></script>