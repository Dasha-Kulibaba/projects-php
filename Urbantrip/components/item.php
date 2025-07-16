<div class="item popular-item">
	<?php
	if (isset($_SESSION['user'])) {
		echo ('	<a href="' . $like . '" class="item-like">
		<img
		src="' . $heart . '"
		alt="like" />
</a>');
	}
	?>

	<div class="item-img">
		<img src="<?php echo ($cover) ?>" alt="<?php echo ($name) ?>" />
	</div>
	<a href="<?php echo ($link) ?>" class="item-text"><?php echo ($name) ?></a>
</div>