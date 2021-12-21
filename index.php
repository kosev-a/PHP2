<?php

/* Подгрузка контента с помощью AJAX. */

// подключаемся к БД
$db = mysqli_connect('localhost', 'root', '', 'GB') or die ("Невозможно подключиться к БД");
$res = mysqli_query($db, "SELECT * FROM product WHERE 1 ORDER BY id LIMIT 5");

// формируем массив товаров
$products = [];
while ($row = mysqli_fetch_assoc($res)) {
	$products[] = $row;
} 

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Homework4</title>
</head>
<body>
	<div>
		<?php foreach ($products as $product): ?>
			<p><?php echo $product['title']; ?><br />
			<?php echo $product['price']; ?></p><br />
			<br />
		<?php endforeach; ?>
	</div>

	<input class="btn" type="button" value="Загрузить еще">
	
	<script src="/js.js"></script>
</body>
</html>

