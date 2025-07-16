<?php
require('../connect.php');
if (!isset($_SESSION['email'])) {
	$return = "../index.php?message=1";
	header('location:' . $return);
	exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="../../styles/styles.css" />

</head>


<body>
	<section class="autorize">
		<div class="container autorize__container ">
			<div class="autorize__content">
				<form action="../actions/add.php" method="post" enctype="multipart/form-data">
					<input type="text" maxlength="230" name="title" required placeholder="Назва">
					<input type="file" name="file" accept=".jpg, .png,  .pdf " required>
					<input type="number" hidden value=4 name="section_id">
					<input type="number" hidden name="author_id" value="<?php echo ($_SESSION['email'])?>">
					<button type="submit" class="button_item">Додати</button>

				</form>
			</div>
		</div>
	</section>
</body>

</html>