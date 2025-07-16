<?php

require('../connect.php');
CheckAdmin();
CheckEdit();
$query = "SELECT * FROM `documents` WHERE `id`=" . $_GET['id'];
$res = mysqli_query($db, $query);
$query_2 = "SELECT * FROM `users` ";
$users = mysqli_query($db, $query_2);
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

				<?php
				if ($res->num_rows > 0) {
					$item = mysqli_fetch_assoc($res);
					echo
					'	<p>
			<form action="../actions/edit.php" method="post" enctype="multipart/form-data">
				<input type="text" maxlength="230" name="title" required value="' . $item['title'] . '" placeholder="Назва">
				<input type="file" name="file" accept=".jpg, .png, .docx, .doc, .pdf, .xlsx, .pptx " >
							<input type="number" hidden value="' . $item['section_id'] . '" name="section_id">
			<input type="number" hidden value="' . $item['id'] . '" name="id">
			<select name="author_id">';
					while ($user = mysqli_fetch_assoc($users)) {
						echo '<option value="' . $user['id'] . '" ' . ($user['id'] == $item['author_id'] ? "selected" : " ") . ' >' . $user['name'] . '</option>';
					}
					echo '</select>

				<button type="submit" class="button_item">Додати</button>
			</form>
		</p>';
				} else {
					echo '<p>Такого файлу не знайдено</p>';
				}
				?>
			</div>
		</div>
	</section>
</body>

</html>