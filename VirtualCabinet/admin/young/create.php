<?php
require('../connect.php');
CheckAdmin();

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
					<input type="file" name="file" accept=".jpg, .png, .docx, .doc, .pdf, .xlsx, .pptx " required>
					<select name="type" required>
						<?php
						for ($i = 1; $i < count($young_types); $i++) {
							echo '<option value=' . $i . '>' . $young_types[$i] . '</option>';
						}
						?>
					</select>
					<input type="number" hidden value=1 name="section_id">
					<button type="submit" class="button_item">Додати</button>
				</form>
			</div>
		</div>
	</section>
</body>

</html>