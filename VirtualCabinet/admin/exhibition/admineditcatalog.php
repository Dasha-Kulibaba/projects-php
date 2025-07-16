<?php

require('../connect.php');

CheckAdmin();
$query = "SELECT documents.id,documents.title, documents.link, users.name,documents.create_date  FROM `documents`   JOIN `users` ON documents.author_id=users.id WHERE documents.section_id = 4 ORDER BY  documents.id";
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
					echo '						<div class="news__container-content autorize__block" >';
					while ($item = mysqli_fetch_assoc($res)) {
						echo '

						<div class="news__container-block expo__block">
						<article class="expo__container-card" aria-label="Фотогалерея експозиції 2025 року">
						<figure class="expo__container-card__figure preview" style="height:auto">
						<figcaption class="expo__container-card__figure-title">
						<p class="expo__container-card__figure-title-title">' . $item['title'] . '</p>
						<p class="expo__container-card__figure-title-author">' . $item['name'] . '</p>
						</figcaption></figure>
						</article>
						<div class="news__container-block-file-inner__admin">
						<a href="../exhibition/adminedit.php?id=' . $item['id'] . '" class="admin__icon admin__edit">
						<img src="../public/planner/icons/edit.svg"></a>
						<a href="../actions/delete.php?id=' . $item['id'] . '" data-filename="new_category_upd" class="admin__icon admin__delete">
						<img src="../public/planner/icons/delete.svg">
						</a>
						</div></div>

						';
					}
					echo '						</div>';
				} else {
					echo ' Схоже, ви ще не додали жодного елемента';
				}
				?>
			</div>
		</div>
		<script>
			const item_delete = document.querySelectorAll(".admin__delete");

			item_delete.forEach((item) => {
				item.addEventListener("click", function(event) {
					event.preventDefault();
					const conf = confirm(
						"Ви впевненні, що хочете видалити " + this.dataset.filename
					);
					if (conf) {
						window.location.href = this.href;
					}
				});
			});
		</script>
	</section>
</body>

</html>