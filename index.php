<?php 
	include_once "db.php";

	$shopping_items = getTodos();
?>
<!DOCTYPE html>
<html lang="de">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="style.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
		<title>Einkaufsliste</title>
	</head>
	<body>
		<div class="container">
			<form action="controller.php" method="POST">
				<div class="add_button">
					<input type="text" name="item_name" placeholder="Name" class="input_title">
					<input type="hidden" name="action" value="create">
					<button type="submit">
						<span class="material-symbols-outlined">
							add
						</span>
					</button>
				</div>
			</form>
			<div class="shopping_list">
				<?php foreach ($shopping_items as $shopping_item) { 
					if (!$shopping_item->checked) { ?>
						<div class="shopping_item">
							<input class="shopping_item_checkbox" type="checkbox" <?= $shopping_item->checked ? "checked" : ""?>>
							<div class="shopping_item_title"><?= $shopping_item->title ?></div>
							<input type="number" name="amount" class="shopping_item_amount" value="<?= $shopping_item->amount ?>">
							<form action="controller.php" method="POST" class="shopping_item_button">
								<input type="hidden" name="action" value="delete">
								<input type="hidden" name="id" value="<?= $shopping_item->id ?>">
								<button type="submit"><span class="material-symbols-outlined">delete</span></button>
							</form>
						</div><?php	
					} else { ?>
						<h2>Im Warenkorb</h2>
						<div class="shopping_item">
							<input class="shopping_item_checkbox" type="checkbox" <?= $shopping_item->checked ? "checked" : ""?>>
							<div class="shopping_item_title"><?= $shopping_item->title ?></div>
							<input type="number" name="amount" class="shopping_item_amount" value="<?= $shopping_item->amount ?>">
							<form action="controller.php" method="POST" class="shopping_item_button">
								<input type="hidden" name="action" value="delete">
								<input type="hidden" name="id" value="<?= $shopping_item->id ?>">
								<button type="submit"><span class="material-symbols-outlined">delete</span></button>
							</form>
						</div><?php	
					}
				} ?>
			</div>
		</div>
	</body>
</html>