<?php

require('../connect.php');
CheckAdmin();
CheckEdit();
$query = "SELECT * FROM `documents` WHERE `id`=" . $_GET['id'];
$res = mysqli_query($db, $query);
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
				<select name="type" required>';

					for ($i = 1; $i < count($qualify_types); $i++) {
						echo '<option value=' . $i . ' ';
						if ($i == $item['type']) {
							echo 'selected';
						}
						echo '>' . $qualify_types[$i] . '</option>';
					}
					echo '
				</select>
							<input type="number" hidden value=' . $item['section_id'] . ' name="section_id">
			<input type="number" hidden value=' . $item['id'] . ' name="id">
				<button type="submit" class="button_item">Оновити</button>
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