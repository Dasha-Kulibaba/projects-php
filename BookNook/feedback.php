<div class="feedback">
	<form action="send.php" class="feedback__form" method="post">
		<div class="feedback__head">
			<div class="feedback__head_title">
				<h5>
					Форма зворотного зв’язку
				</h5>
				<img src="img/close.svg" class="feedback__close">
			</div>

			<p>Надішліть листа і ми відповімо якомога скоріше</p>
		</div>
		<div class="feedback__context">
			<div class="feedback__user user">
				<label>Ваше ім’я
					<input type="text" name="username" id="username" placeholder="Ваше ім’я">
				</label>
				<label>Ваш email
					<input type="text" name="useremail" id="useremail" placeholder="example@gmail.com">
				</label>
			</div>
			<label>Ваше повідомлення
				<textarea name="usertext" id="usertext" cols="30" rows="10" placeholder="Повідомлення"></textarea>
			</label>
			<button type="submit" id="feedback">Надіслати</button>
		</div>
		<p class="feedback__text">або напишіть нам у соцмережах</p>
		<div class="feedback__soc ">
			<img src="img/instagram.svg" alt="instagram">
			<img src="img/telegram.svg" alt="telegram">
		</div>
	</form>
</div>