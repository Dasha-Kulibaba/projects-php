<?php
if (isset($_GET['searchvalue'])) {
	$search = $_GET['searchvalue'];
	session_start();
	$_SESSION['search'] = $search;
}
session_start();
if (isset($_SESSION['search'])) {
	$search = $_SESSION['search'];
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>ShosTam</title>
	<link rel="stylesheet" type="text/css" href="zero.css">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
	<div class="wrapper">
		<nav class="nav">
			<div class="container">
				<div class="smollmenu">
					<div class="smollmenu-flex"><img class="vector1" src="img/Vector 11.svg" alt="">
						<p> Меню </p><img class="vector2" src="img/Vector 10.svg" alt="">
					</div>
				</div>
				<form class="menu" action="category.php" method="get">
					<li>
						<button type="submit" name="cat" value="Сумки&Рюкзаки">Сумки&Рюкзаки</button>
					</li>
					<li>
						<button type="submit" name="cat" value="Значки">Аксесуари</button>
					</li>
					<li>
						<button type="submit" name="cat" value="Ляльки-мотанки">Ляльки-мотанки</button>
					</li>
					<li>
						<button type="submit" name="cat" value="Стікери">Канцелярія</button>
					</li>
				</form>




			</div>
		</nav>
		<header class="header">
			<div class="container">
				<div class="header-flex">
					<div class="logo"><a href="index.php"><img src="img/Logo.svg" alt="Logo"></a></div>
					<div class="info">
						<a href="tel:+380 123 456 78 99">
							<p class="phone phone1">+380 123 456 78 99</p>
						</a>
						<a href="tel:+3801234567899">
							<p class="phone phone2">+380 123 456 78 99</p>
						</a>
						<a href="mailto:email-name@gmail.ukr">
							<p class="email">email-name@gmail.ukr</p>
						</a>
					</div>
					<div class="icons icon">
						<a href=""><img src="img/icon/Phone call.png" alt="phone"></a>
						<a href=""><img src="img/icon/Email.svg" alt="email"></a>
						<a href="https://web.telegram.org/k/"><img src="img/icon/Telegram.svg" alt="telegram"></a>
					</div>
					<form class="serch" action="searchresult.php" method="get">
						<input type="text" id="serchBoxinp" placeholder="Пошук" class="serchBox" name="searchvalue">
						<!-- <div class="resserch"><a href="#" id="resserchinput">
                     </a></div> -->
					</form>
				</div>
			</div>
		</header>
		<main class="content">
			<section class="search">
				<div class="container">
					<h1 class="search-title">РЕЗУЛЬТАТИ ПОШУКУ</h1>
					<hr class="category-line">
					<div class="elements-filter items-filter">
						<?php
						$connect = mysqli_connect("localhost", "root", "", "ShosTam");
						$sql = "SELECT * FROM items where `item_name` LIKE '%$search%'";
						$res = mysqli_query($connect, $sql);
						if (!$res = mysqli_fetch_row($res)) {
							header('Location:searchnoresult.html');
						} else {
							echo '
								<p class="filter">Фільтр </p>
						<div class="type">
							Тип виготовлення <img src="img/arrow.svg" id="type-arrow">
							<div class="type-variants">
								<ul class="type-list">';

							$filter = "SELECT distinct `type` FROM items";
							$fres = mysqli_query($connect, $filter);
							while ($myrow = mysqli_fetch_array($fres, MYSQLI_ASSOC)) {
								echo '
								<form action="searchresult.php" method="get">
								<button type="submit" name="filter" value="' . $myrow['type'] . '">' . $myrow['type'] . '</button>
								</form>
								';
							}

							echo '
									</ul>
							</div>
						</div>
						<div class="source">Виробник <img src="img/arrow.svg" id="source-arrow">
							<div class="type-variants source-variants">
								<ul class="type-list source-list">
									';
							$filter = "SELECT distinct `vyrobnik` FROM items";
							$fres = mysqli_query($connect, $filter);
							while ($myrow = mysqli_fetch_array($fres, MYSQLI_ASSOC)) {

								echo '
								<form action="searchresult.php" method="get">
								<button type="submit" name="vyrobnik" value="' . $myrow['vyrobnik'] . '">' . $myrow['vyrobnik'] . '</button>
								</form>
								';
							}

							echo '
									</ul>
							</div>
						</div>
					</div>
					<div class="elements-container">
									';
							if (isset($_GET['filter']) || isset($_GET['vyrobnik'])) {
								if (isset($_GET['filter'])) {
									$filters = $_GET['filter'];
									$sql = "SELECT * FROM items where `item_name` LIKE '%$search%'and `type`='$filters'";
								} else if (isset($_GET['vyrobnik'])) {
									$filters = $_GET['vyrobnik'];
									$sql = "SELECT * FROM items where `item_name` LIKE '%$search%' and `vyrobnik`='$filters'";
								}
							}
							$element = mysqli_query($connect, $sql);
							while ($result = mysqli_fetch_array($element, MYSQLI_ASSOC)) {
								echo '
										<div class="element">
										<a href="item.php?item=' . $result['item_id'] . '" class="element-cover"><img src="' . $result['category_image'] . '" alt=""></a>
										<div class="element-description">
											<a href="item.php?item=' . $result['item_id'] . '">
												<p class="element-title">' . $result['item_name'] . '</p>
											</a>
											<p class="element-text">' . $result['item_descr'] . '</p>
											<form action="item.php" method="get">
											<button  class="element-details" type="submit" name="item" value="' . $result['item_id'] . '">Детальніше</button>
											</form>
											</div>
									</div>
										';
							}
						}
						unset($_GET['filter']);
						unset($_GET['vyrobnik']);
						// }
						?>

					</div>
				</div>
			</section>
		</main>
		<footer class="footer">
			<div class="container">
				<div class="footer-flex">
					<div class="footer-top">
						<div class="question">
							<div class="question-title footertitle">Виникло питання?</div>
							<form action="feedback.php" method="post" id="form-question" class="form-question">
								<div class="form-title">Напишіть нам</div>
								<div class="form-name"><input type="text" id="username" name="username" placeholder="Ваше ім'я"></div>
								<div class="form-num"><input type="text" id="userphone" name="userphone" placeholder="Номер телефону"></div>
								<div class="form-email"><input type="text" id="useremail" name="useremail" placeholder="Електрона пошта"></div>
								<div class="form-ques"><textarea type="text" id="usertext" name="usertext" placeholder="Ваше питання" rows="5" cols="30"></textarea>
								</div>
								<div class="form-consent"><input type="checkbox" id="consentCheckbox"><label for="consentCheckbox">Я
										приймаю правила сайту,
										публічну оферту та
										даю згоду на обробку моїх персональних даних.</label> </div>
								<div class="form-send"><button type="submit" id="send" name="feedback">Надіслати</div>
							</form>

						</div>
						<div class="contacts">
							<div class="footertitle contacts-title ">Наші контакти</div>
							<div class="contacts-body">
								<div class="contacts-phone">
									<div class="form-title contacts-phone-title ">Телефони зв'язку</div>
									<p class="phone phone1">+380 123 456 78 99</p>
									<p class="phone phone2">+380 123 456 78 99</p>
								</div>
								<div class="contacts-email">
									<div class="form-title contacts-email-title ">Електронна пошта</div>
									<p class="email">email-name@gmail.ukr</p>
								</div>
								<div class="contacts-icon icon">
									<a href=""><img src="img/icon/Phone call.png" alt="phone"></a>
									<a href=""><img src="img/icon/Email.svg" alt="email"></a>
									<a href="https://web.telegram.org/k/"><img src="img/icon/Telegram.svg" alt="telegram"></a>
								</div>
							</div>
						</div>
						<div class="site-navigation">
							<p class="footertitle site-navigation-title ">Навігація по сайту</p>
							<li><a href="error.html">Умови роботи</a></li>
							<li><a href="about.html">Про нас</a></li>
						</div>
					</div>
					<div class="footer-bottom">
						<p class="rights">© 2024 | всі права захищено</p>
					</div>
				</div>
			</div>
		</footer>
	</div>
	<script src="menu.js"></script>
	<script src="filters.js"></script>
	<script src="feedback.js"></script>
</body>

</html>