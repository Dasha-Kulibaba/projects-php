<header class="header">
	<div class="container header-container">
		<div class="header-content">
			<a href="<?php echo ($main) ?>" class="header-link">UrbanTrip</a>
			<nav>
				<ul class="header-list">
					<li class="header-menu">
						<a href="<?php echo ($tours) ?>" class="header-item">Екскурсії</a>
					</li>
					<li class="header-menu">
						<a href="<?php echo ($search) ?>" class="header-item"><img src="<?php echo ($icon_src) ?>" alt="search-icon" /></a>
					</li>
					<li class="header-menu">
						<?php
						if (isset($_SESSION['user'])) {
							echo ('<img class="avatar" src="' . $avatar . '" alt="avatar" />');
						} else echo ('<a href="' . $signup . '" class="header-item">Увійти</a>') ?>

						<div class="hide-menu">
							<a href="<?php echo ($favorite) ?>" class="hide-link">збережене</a>
							<?php
							if (isset($_SESSION['admin'])) {
								echo ('<a href="' . $admin . '" class="hide-link">адмін-панель</a>');
							}
							?>

							<a href="<?php echo ($quit) ?>" class="hide-link">Вийти</a>
						</div>
					</li>
				</ul>
			</nav>
		</div>
	</div>
</header>
<script src="<?php echo ($script) ?>"></script>